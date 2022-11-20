Simple User Managemet Solution

Stack I am used:

PHP Version 8.1
Laravel 9
Bootstrap 5
MySql


- Database can be created from migrations files or recovered from 
  dump file stored inside <strong>storage/db</strong> folder.
  
- After you start application you should create an account that you can use
  for login on system. Only first visitor can create account and for everyone else 
  this action is forbidden.
  
- After you create an administrator account you can log in to your account.

- As administrator you can do everything like:

	- creating new user ( administrators, clients, secretaries )
	- view them,
	- update them
	- remove them 
	- and upload documents related to the users
	- download documents 
	- remove documents
	- type of documents and file size you can change in config.filesystems

Because the user doesnt need to see documents I am understand that you will
as administrator upload related documents for them. 

- A secretary are limited account to view just clients, see documents and download it
  but you cannot upload it or remove user or his document. 
  
- Also secretary can update user data.

- Secreatary and client must be built by administrator.

- Both administrator and secretary can use search bar to search user by 6-character ID.

- Client can only see few things that he can change, documents and other users are invisible
  for clients..
  
- Every important action will trigger event and the event will send notification to all
  administrators and secretaries on the system.
