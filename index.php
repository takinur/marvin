<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

// Selenium 3 Host
$host = 'http://localhost:4444/wd/hub';

//Using Chrome Driver
$capabilities = DesiredCapabilities::chrome();

$driver = RemoteWebDriver::create($host, $capabilities);

$email = "jokesj@faking.com";
$pass = "#69ASDf@2";
$fname = "Random";
$lname = "dude";

// Navigate to Signup Page
$driver->get('https://www.linkedin.com/signup/');
//$driver->get('http://localhost:8080/Autonomous-Vehicles/');


// Sign Up information  
$driver->findElement(WebDriverBy::id('email-address')) // Find Email Field
    ->sendKeys($email); // Fill the Email

$driver->findElement(WebDriverBy::id('password')) // Find Password Field
    ->sendKeys($pass); // Fill the Password

//Agree and Submit
$driver->findElement(WebDriverBy::id('join-form-submit'))->click(); 

//First Name and Last Name 
$driver->findElement(WebDriverBy::id('first-name')) // Find First Name
    ->sendKeys($fname); // Fill First Name
$driver->findElement(WebDriverBy::id('last-name')) // Find Last Name
    ->sendKeys($lname); // Fill Last Name

//Continue
$driver->findElement(WebDriverBy::id('join-form-submit'))->click(); 


$element = $driver->findElement(WebDriverBy::className('challenge-dialog__iframe'));

$driver->switchTo()->frame($element);
$driver->takeScreenshot('/image.png');





//Select Country
/*
$driver->findElement( WebDriverBy::id('select-register-phone-country') )
               ->findElement( WebDriverBy::cssSelector("option[value='uk']") )
               ->click();
               */
               
//Phone number
$driver->findElement(WebDriverBy::id('register-verification-phone-number')) // Find Phone
->sendKeys('123456'); // 

$driver->findElement(WebDriverBy::id('register-phone-submit-button'))->click(); 
              

/*

//Print title of the current page to output
echo "The title is '" . $driver->getTitle() . "'\n";

// print URL of current page to output
echo "The current URL is '" . $driver->getCurrentURL() . "'\n";

// find element of 'History' item in menu
$historyButton = $driver->findElement(
    WebDriverBy::cssSelector('#ca-history a')
);

// read text of the element and print it to output
echo "About to click to button with text: '" . $historyButton->getText() . "'\n";

// click the element to navigate to revision history page
$historyButton->click();

// wait until the target page is loaded
$driver->wait()->until(
    WebDriverExpectedCondition::titleContains('Revision history')
);

// print the title of the current page
echo "The title is '" . $driver->getTitle() . "'\n";

// print the URI of the current page

echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
*/
// delete all cookies
$driver->manage()->deleteAllCookies();

// add new cookie
$cookie = new Cookie('cookie_set_by_selenium', 'cookie_value');
$driver->manage()->addCookie($cookie);

// dump current cookies to output
$cookies = $driver->manage()->getCookies();
print_r($cookies);

// close the browser
//$driver->quit();

