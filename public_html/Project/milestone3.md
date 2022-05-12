<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Paul Gutierrez(psg4)</td></tr>
<tr><td> <em>Generated: </em> 5/11/2022 11:15:28 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-3-shop-project/grade/psg4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to purchase their cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/166727538-f907487b-ad2a-474f-919b-2ebb9a88a633.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screen shoot Order Table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/166727802-0fa44770-0222-43e6-b6e8-73d9fee5ad6d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screen shoot Order  Iterm<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167973309-fb6920a2-1962-4fbd-8330-8262c9f019e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UI Purchase<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the purchase validation code (ensure your ucid and date are included) (Payment method, purchase value, shipping info)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167973485-e3291fbb-9695-411a-a162-5067bd66760e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Validation Code part 1 // For paymenths method I used a select box<br>and the rest I create a require input <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Price check, Quantity/Stock check)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167977116-c1982334-1eaf-41c7-bbb9-6891b2f20efd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before validation <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167977554-46f9d8f2-18cb-468b-9308-5bc278d4f907.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After validation return to the cart and flash some messages Updating Centrum Multivitamin<br>for Women to out of stock<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167977920-0073a8db-dbb7-44b9-ba63-70f6f3a35021.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After validation return to the cart and flash some messages Updating Price of<br>Baby Dove Baby Wash and Shampoo to 20.00<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167978120-d36fe527-c09b-4623-a66a-976e7c61f783.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After change visibility of the product of [Baby Wipes,Sensitive Water Based] now will<br>be false<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167978409-1495f027-5e50-4e1d-bb11-b087aea7551b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Validation success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>I make a Query of SQL where I got all the columns from<br>the cart tables  and also another Query where I got the price,<br>stock, visibility  from the table of products(RM_Items in my case)... Then I<br>compare (in case of stock) stock of an Item with quantity desider on<br>cart table... if Stock is less than desired quantity then  prepare an<br>Update query  for carts table and return to cart page<br>If stock ==<br>0 or visibility ==0( false) then I deleted from the cart and return<br>to cart page<br>Also I check the price quantity in the same way. <br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/75">https://github.com/paul080791/IT202-006/pull/75</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/Checkout.php">https://psg4-dev.herokuapp.com/Project/Checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167978409-1495f027-5e50-4e1d-bb11-b087aea7551b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>show order confirmation page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>From the data base of Orders I got the max id of the<br>user in session.<br>Then from OrderItems table I select almost every column where the<br>order_id is equal to the max previosly founded <br>Then From table order in<br>another query I select the address, payment method <br>Finally I show the information<br>in the page.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/76">https://github.com/paul080791/IT202-006/pull/76</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/orderConfirmation.php">https://psg4-dev.herokuapp.com/Project/orderConfirmation.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167980782-1d2fa6b4-d83b-4427-936f-4949e154f0e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Purchase History page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167980845-aced183d-765d-4899-9dca-e248c722df17.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order Detail page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>I select the columns from order table from a query ... Then I<br>show the information of the orders where the user id is the same<br>in session.<br>In the order number I made is as a link and the<br>when I click the order number Its going to the page of order<br>detail and Get the id order from the headers.<br>In the order detail page<br>I Get the id and select from the Order Items all the information<br>and display it.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/77">https://github.com/paul080791/IT202-006/pull/77</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/purchase_history.php">https://psg4-dev.herokuapp.com/Project/purchase_history.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/order_Information.php?order_id=4">https://psg4-dev.herokuapp.com/Project/order_Information.php?order_id=4</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167981756-30acd96e-da70-4698-9a52-1704087ac298.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing global history purchases from owner or admin<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page) (from a user that's not the Store Owner)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167981872-98902e56-bbc9-4c35-99ea-72b6cfea38e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show detail of a purchase from user that is not store ownes(psg4)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>I use the same code of history purchase but in this case I<br>select the orders from all the users. And I deleted the conditional to<br>allow the user get all numbers. I create a order detail page in<br>the admin folder and show the information with no conditional (that check if<br>order belongs to user)<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/77">https://github.com/paul080791/IT202-006/pull/77</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/admin/order_information.php?order_id=2">https://psg4-dev.herokuapp.com/Project/admin/order_information.php?order_id=2</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/admin/all_purchase_history.php">https://psg4-dev.herokuapp.com/Project/admin/all_purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167984026-070fa537-59a5-4e55-bb6b-948d388fdafe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing update proposal in github<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/167984918-e73481eb-17dd-49f5-be33-a5d1729d2c4c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Issues Done<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-3-shop-project/grade/psg4" target="_blank">Grading</a></td></tr></table>