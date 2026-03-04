import sys
import json
import numpy as np
from sklearn.linear_model import LogisticRegression
from scipy.stats import norm

# Baca data dari stdin
input_data = json.load(sys.stdin)
X = np.array(input_data['X']).reshape(-1, 1)
Y = np.array(input_data['Y'])

# Model logistik multinomial (multiclass)
model = LogisticRegression(multi_class='multinomial', solver='lbfgs')
model.fit(X, Y)

# Estimasi parameter
intercepts = model.intercept_.tolist()
coefs = model.coef_.tolist()
classes = model.classes_.tolist()

# Probabilitas prediksi untuk setiap kelas
probs = model.predict_proba(X).tolist()

# Fungsi logit untuk setiap kelas
logits = (X @ np.array(model.coef_).T + np.array(model.intercept_)).tolist()

# Uji signifikansi parameter (aproksimasi, hanya untuk binary)
if len(classes) == 2:
    pred = model.predict_proba(X)[:,1]
    X_design = np.hstack([np.ones_like(X), X])
    V = np.diag(pred * (1 - pred))
    try:
        cov = np.linalg.inv(X_design.T @ V @ X_design)
        se = np.sqrt(np.diag(cov))
        z = np.array([model.intercept_[0], model.coef_[0][0]]) / se
        p = 2 * (1 - norm.cdf(np.abs(z)))
        signif = {
            'se': se.tolist(),
            'z': z.tolist(),
            'p': p.tolist()
        }
    except Exception:
        signif = None
else:
    # Multinomial: Aproksimasi standar error, z, p-value untuk setiap kelas dan parameter
    try:
        n_classes = len(classes)
        n_features = X.shape[1]
        n_params = n_features + 1  # intercept + features
        se_list = []
        z_list = []
        p_list = []
        for k in range(n_classes):
            # Untuk setiap kelas, hitung prediksi probabilitas
            pred = np.array(probs)[:, k]
            X_design = np.hstack([np.ones((X.shape[0], 1)), X])
            V = np.diag(pred * (1 - pred))
            try:
                cov = np.linalg.pinv(X_design.T @ V @ X_design)
                se = np.sqrt(np.diag(cov))
                # Intercept dan koefisien
                params = [intercepts[k]] + [coefs[k][i] for i in range(n_features)]
                z = np.array(params) / se
                p = 2 * (1 - norm.cdf(np.abs(z)))
                se_list.append(se.tolist())
                z_list.append(z.tolist())
                p_list.append(p.tolist())
            except Exception:
                se_list.append([None]*n_params)
                z_list.append([None]*n_params)
                p_list.append([None]*n_params)
        signif = {
            'se': se_list,
            'z': z_list,
            'p': p_list
        }
    except Exception:
        signif = None

# Output
result = {
    'classes': classes,
    'intercepts': intercepts,
    'coefs': coefs,
    'probs': probs,
    'logits': logits,
    'signif': signif
}
print(json.dumps(result))
