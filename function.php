function insertMessage ($recipient, $messageType, $messageText)
{
    $query = "insert into ozekimessageout (receiver,msgtype,msg,status) ";
    $query .= "values ('" . $recipient . "', '" . $messageType . "', '" . $messageText . "', 'send');";
    $result = mysql_query($query);
    if (!$result)
    {
        echo (mysql_error() . "<br>");
        return false;
    }

    return true;
}