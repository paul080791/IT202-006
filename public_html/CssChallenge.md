<table><tr><td> <em>Assignment: </em> JavaScript & CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Paul Gutierrez(psg4)</td></tr>
<tr><td> <em>Generated: </em> 2/18/2022 8:51:40 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/javascript-csschallenge/grade/psg4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul>
<li>Reminder: Make sure you start in dev and it&#39;s up to date<ol>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
<li><code>git checkout -b M3-Challenge-HW</code></li>
</ol>
</li>
</ul>
<ol>
<li>Create a copy of the template given here: <a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a> </li>
<li>Implement the changes defined in the body of the code</li>
<li><strong>Do not</strong> edit anything where the comments tell you not to edit, you will lose points for not following directions</li>
<li>Make changes where the comments tell you (via TODO&#39;s or just above the lines that tell you not to edit below)<ol>
<li><strong>Hint</strong>: Just change things in the designated <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> tags</li>
<li><strong>Important</strong>: The function that drives one of the challenges is <code>updateCurrentPage(str)</code> which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li>
</ol>
</li>
<li>Create a branch called M3-Challenge-HW if you haven&#39;t yet</li>
<li>Add this template to that branch (git add/git commit)</li>
<li>Make a pull request for this branch once you push it</li>
<li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li>
<li>Create a new file <strong>m3_submission.md</strong> file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li>
<li>Add, commit, and push the submission file</li>
<li>Close the pull request by merging it to dev (double-check all looks good on dev)</li>
<li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li>
<li>Complete the merge to deploy to production</li>
<li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Primary page with the checklist items completed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/154779294-2e27fb33-3286-4045-a2ac-1cd8cc71e484.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>First page <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot showing after the login link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/154779359-64875776-5e58-49e3-b6e8-b76d707ea9c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login page screenshoot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot showing after the register link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/154779462-c3d58596-12d2-47ea-82fa-8179a3c899a9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Register page Screenshoot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Screenshot showing after the profile link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/154779525-9e6f716d-91ea-437d-80ea-b39f9f49ad41.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page Screenshoot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Screenshot showing after the logout link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/154779560-9bd550c7-f89b-4632-b965-75cc4f508462.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Logout page Screenshoot<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>I change the unordered list display, but the one inside nav tag :<br>nav &gt; ul :{...} I changed it to  flex.  Then I<br>add justify - content : space-evenly . This add space evenly between the<br>items on the list <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>I change the attribute list-style-type to none.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <p>I use a css selector to change the background of nav tag.<br>nav {<br>....<br>}<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>I use css selector and then I use : hover  to all<br>the &quot;a&quot; tag and change the background inside the brackets.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>I use CSS Element Element Selector  for tags li ul li:: before<br> { ..} and change the content attribute as  &quot;✓&quot;.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>I use CSS selector to the h1 and &quot;a&quot; tags and add the<br>attribute text-transform: capitalize; <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>I change the h2 tag with css Selectors. I change the text align<br>to the center and also change the text-decoration to put the text underlined<br>and the color of the line i changed as well. Finally I changed<br>the background color as Yellowgreen<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>It doesn&#39;t impact because first I use a selector nav &gt; ul :{...}<br>this means that is only change the ul inside a nav tag. so<br>when I change the other list it doesnt affect this one.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>First in onload I create a variable to get elements by tag name<br>&quot;a&quot;. Then I did a for loop to add event listener which is<br>Click and call the function getCurrent Selection.<br>Inside This function I just use the<br>function UpdateCurrentPage with the parameter as click.srcElement.innerText (this I get the text of<br>the element I click on).<br>UpdateCurrentPage does the change of the h1 tag <br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>UpdateCurrentPage does the change of the title tag <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>I learned a lot how to use CSS selector, hover, element &gt; element<br>, etc. I also learn javascript arrays and add events to each one<br>of them. <br>The most difficult was to change the tag h1 and title<br>when I click a link.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/7">https://github.com/paul080791/IT202-006/pull/7</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-prod.herokuapp.com/challenge.html">https://psg4-prod.herokuapp.com/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/javascript-csschallenge/grade/psg4" target="_blank">Grading</a></td></tr></table>