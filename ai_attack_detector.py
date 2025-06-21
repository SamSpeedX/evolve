import re
from sklearn.ensemble import IsolationForest
import numpy as np

LOG_PATH = "/var/www/yourproject/storage/logs/laravel.log"
pattern_sql_xss = re.compile(r"(select\s|union\s|or\s1=1|<script>|alert\(|drop\s)", re.IGNORECASE)

def extract_features(line):
    return [
        len(line),
        int(bool(pattern_sql_xss.search(line))),
        line.count("="),
        line.count("'"),
        line.count("<"),
        line.count(">"),
    ]

with open(LOG_PATH, "r") as f:
    lines = f.readlines()

X = np.array([extract_features(line) for line in lines])
clf = IsolationForest(contamination=0.05)
clf.fit(X)
predictions = clf.predict(X)

print("[📊] Suspicious lines:")
for i, pred in enumerate(predictions):
    if pred == -1:
        print(f"[❗] {lines[i].strip()}")
