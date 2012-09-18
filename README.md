To be checked
==================

This civicrm extension adds a button 'to be checked' in the contact summary.

It's a convenient way to flag a contact as being incomplete or incorrect (eg. the person isn't working there, the phone number is incorrect or missing...) when the user see the error, but can't  fix it right now.

It adds a tag to the contact, providing a convenient way to search all the contacts to be checked.

To support the workflow where there is a dedicted person in the team that is in charge of updating the contacts, it can optionally adds an activity and assign it (to that person).


Install
======

git clone https://github.com/TechToThePeople/tobechecked.git in your local extension repository and it should work


Configuration
=============

You need to add in your civicrm.settings.php a new config variable
global $civicrm_setting;
$civicrm_setting['eu.tttp.tobechecked']['params'] = array(
  'name'=> 'To be Checked', //optional, if you want to change the name
  'assign'=> 42); // id of the contact to be assigned the task

Support and Evolutions
=====================
Ask in the extensions forum on civicrm.org. 

In general, if you have an idea and the skills to implement it (or the budget to make it happen), it will be added and I might burn a candle while chanting your name as a mantra, or tatoo it on my left shoulder (your name, not the candle).
