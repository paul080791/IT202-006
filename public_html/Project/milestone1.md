<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Paul Gutierrez(psg4)</td></tr>
<tr><td> <em>Generated: </em> 4/5/2022 4:30:20 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone1-deliverable/grade/psg4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161820447-b4d2a46a-1831-4e3a-a75b-ef533a0a7e11.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing invalid username error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161820845-a06b4dac-d525-42ae-88b9-4ba065e88991.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing duplicate email  error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161821283-691a54b2-65de-4acf-a539-f1cf4e7351cb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing successful registes<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161822369-7dd7968d-6b71-4e04-af0e-92e4a89a957a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing the newly register user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/36">https://github.com/paul080791/IT202-006/pull/36</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>This is php is applied to  a form where user can register<br>an account. First validate the form on the client side( email, username ,password,<br>current password) . If all is correct, we can submit the form. Then<br>we validate on the server side, for instance we comparing the email with<br>my emails saved on my database, we filter and sanitize also. When all<br>is good we save it on the Database. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161823752-b2bee3f0-99f9-4ac4-90d8-8f4a8c849b94.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>login error 1 Invalid Password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161826114-4ac06e96-ccb6-4a3c-ab4f-0759c62a6179.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>login error 2 Invalid email<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161826303-5ce6d96e-3126-4010-8a8b-4b735c7592df.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>login (before) email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161823910-0d0e7b21-8b49-4f4b-a521-8adb6c70b51e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>login success <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/37">https://github.com/paul080791/IT202-006/pull/37</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Login.php allowed user to login into his/her account. This php validates the form<br>before submitted and then validate the server side. Validate if the email is<br>on the DB and if the password match.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161828301-ee01e731-b546-415c-964f-fb8c2d707d91.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>successful logout<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161827391-5c8caaa9-1c23-49a7-80eb-e7dc895a769d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>log out (before) <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161828845-d318055c-0cc8-43cb-a72e-099696d49ec1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing I am log out and Access is protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/37">https://github.com/paul080791/IT202-006/pull/37</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>logout.php call two functions, session_starts()  and then reset_session() that reset the session<br>when it clicks logout.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161828845-d318055c-0cc8-43cb-a72e-099696d49ec1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing I am log out and Access is protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161829910-11414ef1-3eb8-41ad-8b24-3f99116005dd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing the role page is protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161830247-2e6d628f-4b63-49d3-bb50-361260d1a43d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing Roles table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161831538-dcbdf582-3ff2-4de8-b248-5c947b6659fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing UserRoles Table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/42">https://github.com/paul080791/IT202-006/pull/42</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>if the session was reset then go back to the login page and<br>show the message &quot;you have to log in&quot;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Check if user has an admin permission that I add in DB, If<br>not show message and go back to the login page<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161828301-ee01e731-b546-415c-964f-fb8c2d707d91.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing my site&#39;s Styles<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/41">https://github.com/paul080791/IT202-006/pull/41</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>applied color to body to change text color, applied background color to body<br>to change background color,<br>applied color to class .alert-sucess to change text color, applied<br>background color to .alert-sucess to change background color<br>applied margin-bottom to 0.5cm to make<br>space on the botton of each input<br>applied color to class .alert-warning to change<br>text color, applied background color to .alert-warning to change background color<br>same in danger<br>and info classes</p><br><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161835217-fd08403d-8d0f-473a-b838-d95325251aa6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing friend messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161835350-3de262eb-9ef0-41c2-a8a3-533b021fefdb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing friendly messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161835814-89aa1352-7f7e-431f-8bd9-17ef89370791.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing friendly messages<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/37">https://github.com/paul080791/IT202-006/pull/37</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>uses classes in Css file (styles.css)  to change backgrounds and text colors<br>depends of which errors user made.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161836241-0725884c-42c3-4a52-9c20-93b2f7e8b7a6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing profile<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/40">https://github.com/paul080791/IT202-006/pull/40</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>in view showing the email of the user (already log in) and an<br>input box to change<br>also the username and an input box to change the<br>username <br>and in order to change the password  it also have 3<br>input box where you can change your password . <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161839843-cffbf060-ccc5-44f5-8917-1d6044616876.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing Edit profile change  from paul1 to paultest2(before click)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161839332-327f8085-4ec3-4f46-b27f-6944e88e00c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing Edit profile error paultest2 is taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161841561-677eee4c-7470-482b-860a-15da169c0ec0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>show correct successful change of username<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161840293-0f2fa93e-22eb-42ad-9c4d-0fe4040e3ee0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing user table (before)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161841692-31336b50-df47-40dc-9613-7716ea9b28c8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>show user table after the change<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/40">https://github.com/paul080791/IT202-006/pull/40</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>validate first on the client side if username is good to go and<br>then on the server-side validate if that username is available.</p><br><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161780373-69c2615c-0d41-495a-a839-af13e69c245b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing only of sample of completed items<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/161843376-8ebe7179-9586-4e89-b35a-1409231b5acb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing completed issues<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone1-deliverable/grade/psg4" target="_blank">Grading</a></td></tr></table>