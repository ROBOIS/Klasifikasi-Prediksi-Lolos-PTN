import sys
import json
import numpy as np

from scipy.stats import norm
from sklearn.linear_model import LogisticRegression

# Baca data dari stdin
input_data = json.load(sys.stdin)
# Sekarang X adalah matriks dengan 3 fitur: jumlah_nilai, rangking, kip
X = np.array(input_data['X'])  # shape: (n_samples, 3)
Y = np.array(input_data['Y'])

# Model logistik
model = LogisticRegression(solver='lbfgs')
model.fit(X, Y)

# Parameter
intercept = float(model.intercept_[0])
coefs = model.coef_[0].tolist()  # [b1, b2, b3]

# Probabilitas prediksi
probs = model.predict_proba(X)[:,1]

# Standard error, z, p-value (aproksimasi)
pred = model.predict_proba(X)[:,1]
X_design = np.hstack([np.ones((X.shape[0], 1)), X])
V = np.diag(pred * (1 - pred))
try:
    cov = np.linalg.inv(X_design.T @ V @ X_design)
    se = np.sqrt(np.diag(cov))  # [se_intercept, se_b1, se_b2, se_b3]
    z = np.array([intercept] + coefs) / se
    p = 2 * (1 - norm.cdf(np.abs(z)))
except Exception:
    se = z = p = [None]*4

# Output
result = {
    'intercept': round(intercept, 4),
    'coefs': [round(float(c), 4) for c in coefs],
    'se': [round(float(s), 4) if s is not None else None for s in se],
    'z': [round(float(val), 4) if val is not None else None for val in z],
    'p': [float(val) if val is not None else None for val in p],
    'probs': [round(float(p), 4) for p in probs]
}
print(json.dumps(result))

