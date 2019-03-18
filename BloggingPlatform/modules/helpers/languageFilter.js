/*
 * Project: CST-126-Blog-Project v.0.3
 * Module Name: helpers v.0.2
 * Author: Daniel Cender
 * Date: March 17, 2019
 * Synopsis: This script checks the content forms of the blog platform for filthy language and alerts the user of their infringement.
 * 
 * Instructions:
 * 1. Add Script ref to HTML Head/Body: <script src="../relativepath/helpers/languageFilter.js"></script>
 * 2. On any HTML Form text inputs, add the attribute  onchange="languageFilter(this.value)"
 * 3. Add the id of "submit_btn" to the submit button for the form
 */

var languageFilter = function(string){
	var bannedWordRegex = /^.*(fuck|damn|hell|shit|hell|frick|bitch|cunt|retard|f..k|f.ck|d.mn|sh.t).*?/gmi;

	if(bannedWordRegex.test(string)) {
		document.getElementById("submit_btn").disabled = true;
		window.alert('You have entered language that breaks the blog code of conduct. Please revise your draft.');
	} else {
		document.getElementById("submit_btn").disabled = false;
	}
};

