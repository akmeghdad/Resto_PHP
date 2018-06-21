<?php
class LogoutModel
{
	public function deconnextion(array $user=array())
    {
    	session_destroy();
    }
}