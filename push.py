from os import system

message = input('message: ')

system('git config user.name "EstragouEAgora"')
system('git config user.email "projetoestragoueagora@gmail.com"')
system('git add .')
system('git commit -m "' + message + '"')
system('git push origin master')