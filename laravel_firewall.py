import time
import subprocess

LOG = "/var/www/yourproject/storage/logs/blacklist.log"
blocked_ips = set()

def block(ip):
    if ip in blocked_ips:
        return
    print(f"[FIREWALL] Blocking: {ip}")
    subprocess.run(["iptables", "-A", "INPUT", "-s", ip, "-j", "DROP"])
    blocked_ips.add(ip)

def monitor():
    with open(LOG, "r") as f:
        f.seek(0, 2)
        while True:
            line = f.readline()
            if not line:
                time.sleep(1)
                continue
            if "BLOCK:" in line:
                ip = line.split("BLOCK:")[1].strip()
                block(ip)

if __name__ == "__main__":
    monitor()
