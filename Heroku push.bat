@echo off
set /p message="Commit mesage: "
git add .
git commit -am "%message%"
git push heroku master
pause
