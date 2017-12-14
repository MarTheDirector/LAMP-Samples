# CSCI441 Chat V1 #
This is V1 of a simple (insecure) chat server.  We will be making improvements on it as we learn new concepts.

## Setup ##
To get the chat server up and running: 
- Make sure you have a mysql account from the [Birdnest MySQL Server](http://deltona.birdnest.org/mysql/).
- Enter the server details into [mysql.php](mysql.php)
- Execute the SQL in [setup/install.sql](setup/install.sql)

## Using the Class Version ##
The following settings can be used to access the shared class chat:
```php
	$myhost = "daytona.birdnest.org";
	$mydbname = "my_besmera2";
	$myuser = "my.besmera2";
	$mypass = "CSCI355";
``` 

## chat.php Documentation ##
[chat.php](chat.php) supports HTTP POST or GET with the following paramaters:

| METHOD | Paramaters    |
| ------ | ----------    |
| GET    | [lastChat]    |
| POST   | message |

A successful POST will return a status code of 200 and no message body.  *Note: You must be authenticated first to post.  Failure to do so will result in an HTTP error 401 Unauthorized.

A successful GET will return an ordered array of JSON objects.  Each object represents a chat message.  You can optionally specify a lastChat paramater which indicates the last chat message you retrieved from the server.
```json
[
    {
        "id": "1",
        "user": "besmera",
        "message": "Hi there!",
        "sent": "2014-02-11 00:06:21"
    },
    {
        "id": "2",
        "user": "Ned Flanders",
        "message": "Hidey Ho, neighbor!",
        "sent": "2014-02-11 00:08:16"
    }
]
```

And when specifying an optional lastChat=1
```json
[
    {
        "id": "2",
        "user": "Ned Flanders",
        "message": "Hidey Ho, neighbor!",
        "sent": "2014-02-11 00:08:16"
    }
]
```

## login.php Documentation ##
[login.php](login.php) supports HTTP POST with the following paramaters:

| METHOD | Paramaters               |
| ------ | ----------               |
| POST   | username, password       |

A successful POST with valid credentials will return a status code of 200, a cookie and no message body. 
A successful POST with invalid credentials will return an HTTP error 400 - Bad Request.

## logout.php Documentation ##
[logout.php](logout.php) supports HTTP GET with the following paramaters:

| METHOD | Paramaters    |
| ------ | ----------    |
| GET    |               |

A successful GET will return a status code of 200, an expired cookie, and no message body.  


## Need help? ##
Contact <besmera@winthrop.edu>
