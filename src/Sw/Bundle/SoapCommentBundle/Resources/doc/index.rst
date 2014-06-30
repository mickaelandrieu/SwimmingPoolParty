Client SOAP

You must use the provided wsdl file in `` /Fixtures `` folder.
The file defines the rules for using the services provided by the SOAP server.


getComments/{swimmingPoolId}
============================

For a given pool identifier, returns the list of associated comments
Returns an xml file, the same structure as that found in ``/Fixtures`` folder.

addComment/[$swimmingPoolId, $author, $content, $rank]
======================================================

Add a comment to a pool identifier $ swimmingPoolId.
Be careful to follow the order of variables.

Returns nothing.
