from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait






driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/register")
name = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'name')))
name.send_keys("Osaid")
username = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'username')))
username.send_keys("IL")
email = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'email')))
email.send_keys("Osaid@gmail.com")
password = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'password')))
password.send_keys("qwertyuio")
Confirm_Password = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'password-confirm')))
Confirm_Password.send_keys("qwertyuio")
clickBtn = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'signup')))
clickBtn.click()
