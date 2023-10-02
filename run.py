from subprocess import Popen
from os import system
import shutil
import platform
from time import sleep

system('npm install')
system('composer install')

#create .env
open('.env', 'w')
shutil.copyfile('.env.example', '.env')

with open('.env', 'r') as file:
    data = file.readlines()

data[13] = "DB_DATABASE=" + "estragou" + "\n"
data[14] = "DB_USERNAME=" + "alunos" + "\n"
data[15] = "DB_PASSWORD=" + "cefetmg" +"\n"

with open('.env', 'w') as file:
    file.writelines(data)

system('php artisan key:generate')

sistema = platform.system()
if sistema=="Linux":
    p1 = Popen(['x-terminal-emulator', '-e', 'bash', '-c', 'npm run dev'])
    sleep(5)
    p2 = Popen(['x-terminal-emulator', '-e', 'bash', '-c', 'php artisan serve'])
    sleep(5)
    p3 = Popen(['x-terminal-emulator', '-e', 'bash', '-c', 'xdg-open http://127.0.0.1:8000'])
else:
    p1 = Popen('start cmd /k npm run dev', shell=True)
    sleep(5)
    p2 = Popen('start cmd /k php artisan serve', shell=True)
    sleep(5)
    p3 = Popen('start http://127.0.0.1:8000', shell=True)

system("php artisan createadm")
system("php artisan storage:link")