import time
import subprocess
import re

LOG_FILE = "/var/log/nginx/access.log"
BAD_AGENTS = ["python-requests", "curl", "scrapy", "wget", "httpclient", "bot", "spider"]

def block_ip(ip):
    print(f"[🔥] Blocking suspicious bot IP: {ip}")
    subprocess.run(["iptables", "-A", "INPUT", "-s", ip, "-j", "DROP"])

def is_bad_bot(line):
    for agent in BAD_AGENTS:
        if agent in line.lower():
            return True
    return False

def tail_log():
    with open(LOG_FILE, "r") as f:
        f.seek(0, 2)
        while True:
            line = f.readline()
            if not line:
                time.sleep(0.3)
                continue
            if is_bad_bot(line):
                ip = line.split()[0]
                block_ip(ip)

if __name__ == "__main__":
    print("[🛡️] Bot detector started...")
    tail_log()
