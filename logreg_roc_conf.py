from sklearn.metrics import ConfusionMatrixDisplay
import sys
import json
import numpy as np
import matplotlib.pyplot as plt
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import roc_curve, auc, confusion_matrix

# Baca data dari stdin atau file json
if len(sys.argv) > 1:
    with open(sys.argv[1], 'r') as f:
        input_data = json.load(f)
else:
    input_data = json.load(sys.stdin)

X = np.array(input_data['X']).reshape(-1, 1)
Y = np.array(input_data['Y'])

# Model logistik
model = LogisticRegression(solver='lbfgs')
model.fit(X, Y)

# ROC Curve
probs = model.predict_proba(X)[:, 1]
fpr, tpr, _ = roc_curve(Y, probs)
roc_auc = auc(fpr, tpr)
plt.figure()
plt.plot(fpr, tpr, label=f'ROC curve (AUC = {roc_auc:.2f})')
plt.plot([0, 1], [0, 1], 'k--')
plt.xlabel('False Positive Rate')
plt.ylabel('True Positive Rate')
plt.title('ROC Curve')
plt.legend(loc='lower right')
plt.tight_layout()
plt.savefig('public/roc_curve.png')
plt.close()

# Confusion Matrix
y_pred = model.predict(X)
cm = confusion_matrix(Y, y_pred)
plt.figure()
disp = ConfusionMatrixDisplay(confusion_matrix=cm)
disp.plot(cmap=plt.cm.Blues)
plt.title('Confusion Matrix')
plt.tight_layout()
plt.savefig('public/conf_matrix.png')
plt.close()

# Output model summary (opsional, agar tetap bisa dipakai untuk summary)
a = float(model.intercept_[0])
b = float(model.coef_[0][0])
result = {
    'a': round(a, 4),
    'b': round(b, 4),
    'auc': round(roc_auc, 4),
    'probs': [round(float(p), 4) for p in probs]
}
print(json.dumps(result))
