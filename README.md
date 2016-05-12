Logon with REST API

requires authentication: no
http method: post
expected payload:
user: the username to use authentication as
password: the password for that user
Notes:
You will need to provide the authToken and userId for any of the authenticated methods.
curl http://localhost:3000/api/login
   -d "password=MySECRET&user=sing"

{
  "status": "success",
  "data": {
      "authToken": "9HqLlyZOugoStsXCUfD_0YdwnNnunAJF8V47U3QHXSq",
      "userId": "aobEdbYhXfu5hkeqG"
   }
}
