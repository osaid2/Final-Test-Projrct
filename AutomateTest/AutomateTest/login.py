from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait





driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/login")
email = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'username')))
email.send_keys("said@gmail.com")
password = WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'password')))
password.send_keys("qwertyuio")
clickBtn =  WebDriverWait(driver,20).until(EC.element_to_be_clickable((By.ID,'Login')))
clickBtn.click()
