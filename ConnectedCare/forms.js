/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

/* 
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");

    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent. 
    password.value = "";

    // Finally submit the form. 
    form.submit();
}

function regformhash(form, uid, email, password, conf) {
    // Check each field has a value
    if (uid.value == '' || email.value == '' || password.value == '' || conf.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    
    // Check the username
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
	
	// Validate the username
	// http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(email.value)){
		alert('Please ensure that the email is correct.');
		form.email.focus();
		return false;
	}

    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 10) {
        alert('Passwords must be at least 10 characters long.  Please try again');
        form.password.focus();
        return false;
    }
    
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
    
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
        
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");

    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";

    // Finally submit the form. 
    form.submit();
    return true;
}
//Form for Member Information
function meminfo(form, firstname, lastname, dob, housenam, street, town, county) {
    
    // Check the firstname
    re = /^[a-zA-Z]+$/; 
    if(!re.test(form.firstname.value)) { 
        alert("Firstname must contain only letters. Please try again"); 
        form.firstname.focus();
        return false; 
    }
    // Check the lastname
    re = /^[a-zA-Z]+$/; 
    if(!re.test(form.lastname.value)) { 
        alert("Lastname must contain only letters. Please try again"); 
        form.lastname.focus();
        return false; 
    }
	// Check the housename
    re = /\w/; //The following is equilavent to a "^[a-zA-Z0-9]+$"
    if(!re.test(form.housenam.value)) { 
        alert("You house or building name must contain only numbers and letters. Please try again"); 
        form.housenam.focus();
        return false; 
    }
	// Check the street
    re = /\w/; 
    if(!re.test(form.street.value)) { 
        alert("Your street must contain only letters. Please try again"); 
        form.street.focus();
        return false; 
    }
	// Check the town
    re = /^[a-zA-Z]+$/; 
    if(!re.test(form.town.value)) { 
        alert("Your town must contain only letters. Please try again"); 
        form.town.focus();
        return false; 
    }
	// Check the county
    re = /^[a-zA-Z]+$/; 
    if(!re.test(form.county.value)) { 
        alert("Your county must contain only letters. Please try again"); 
        form.county.focus();
        return false; 
    }
	
    // Finally submit the form. 
    form.submit();
    return true;
}
//Form for the Contact message
function messformhash(form, recipientName, recipientEmail, messagetext){
	// Check the recipient-name
	re = /^[a-zA-Z\s]+$/;
	
    if(!re.test(form.recipientName.value)) { 
        alert("Name must contain only letters. Please try again"); 
        form.recipientName.focus();
        return false; 
    }
	// Check the recipient-email
	// Reference under the regformhash function.
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(recipientEmail.value)){
		alert('Please ensure that the email is correct.');
		form.recipientEmail.focus();
		return false;
	}
    // Finally submit the form. 
    form.submit();
    return true;
}
