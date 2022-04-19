<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Paul Gutierrez(psg4)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 11:44:01 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-2-shop-project/grade/psg4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163882089-275163f9-fc7d-4191-a793-88a4610dfd3d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show psg4 is admin  and paultest2 Shop Owner<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163884145-89142c32-37db-4890-a916-d69b45eb54d2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Add item page for psg4(Admin only)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163883765-cb92747f-4d31-4579-b215-c4dbf59343d3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Add item page for paultest2(Shop Owner only)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163884235-60221eb3-994d-400a-a630-c0b19b3320f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show generate flash message when I add a item for Psg4<br></p>
</td></tr>
<tr><td><img width="768px" src="Customer can't add items"/></td></tr>
<tr><td> <em>Caption:</em> <p><img src="https://user-images.githubusercontent.com/78453577/163884558-d64b2dd1-d0f5-41ca-bdb5-8d4afbfa6847.png" alt="image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163885585-bbe0bea6-302b-4fac-ac27-f92d5589962d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show Populated database<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>First check if the user has the correct role <br>then save the data<br>if user submit the form using the function save_data($TABLE_NAME, $_POST);<br>get the columns of<br>the table RM_Items and then in a foreach loop iterate to create inputs<br>inside a form method Post<br> <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/66">https://github.com/paul080791/IT202-006/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-prod.herokuapp.com/Project/admin/add_item.php">https://psg4-prod.herokuapp.com/Project/admin/add_item.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163887341-255d93a1-27e4-418e-8235-9b996d0b84d5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Any user can view the shop page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163887279-5c7ac534-1b58-4cbb-9450-9b8ff1ba63fd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing 10 items per page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163887722-2c8573d6-7bbe-4691-a993-7b69c19038cf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Apply filter by category &quot;Beauty&quot; <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163887798-8ff964a5-9827-4cc8-8932-9f0c57ac65ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Apply filter Beauty and Price Down<br></p>
</td></tr>
<tr><td><img width="768px" src="Apply filter by cost down for all category"/></td></tr>
<tr><td> <em>Caption:</em> <p><img src="https://user-images.githubusercontent.com/78453577/163888053-94bfaf41-ea04-47ea-b4e5-07a7a7874d08.png" alt="image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163889276-583907f4-5b5f-4695-9940-df23434686ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code  part 1 for filter/sort <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163889429-dc9f1f62-e333-4773-96aa-ecbefd0faf8f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code  part 2 for filter/sort forms <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>I receive the data from  the form and save it on a<br>variable : $col , $order, $category ,$name <br>If user choose a category to<br>filter, make a query where category = $category ( base query selects some<br>columns from Items table)<br>If user do not choose a category we just use<br>the base query<br>Then for $name add to the query AND name like :name<br> <br>Finally for order. I use Asc adn Decs and if user wants<br>an order I create a query ORDER BY  and added to the<br>querys.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/70">https://github.com/paul080791/IT202-006/pull/70</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-prod.herokuapp.com/Project/shop.php">https://psg4-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163915728-1e86da0e-e17d-4b8b-932b-a8c399253ff5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show list items page for admin psg4<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>I get the dat from database and storage in a variable, then in<br>a foreach loop I create a table and add all the columns and<br>its respective values from my database to the table. I add an edit<br>link to edit the item <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/68">https://github.com/paul080791/IT202-006/pull/68</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-prod.herokuapp.com/Project/admin/list_item.php">https://psg4-prod.herokuapp.com/Project/admin/list_item.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163894115-96666929-ce85-4a97-83e7-93ab104cc313.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show Edit button on SHOP page for Admin and Shop Owner<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163893736-2ed54639-cc95-44d3-8145-160def4dd133.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show Edit button in Product Detail Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163915728-1e86da0e-e17d-4b8b-932b-a8c399253ff5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Show list items page for admin psg4<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163894642-86cfa861-9cf8-4dc9-bec1-441d9f47fd26.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before editing List Product<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163894564-1c072445-da5e-4ac0-af7c-2887dc87e664.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before Editing Edit Page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163894787-5e8ddf9b-0fcd-4840-ad0c-40f38c3c1c71.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After Editing Change stock to 5 , Price to 6.75 And Visibility =<br>True<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163895005-c7087e86-3b88-4f51-8101-a71d9a21af24.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After editing  Showing this product of List product <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>Check if the user is an Admin  or Shop Owner...using $_POST[ ]Get<br>the ID of the item to edit and pass it as a variable<br>in the function update_data(...)<br>Get all data from the table but ignore Columns Id,<br>Modified, and created because it shouldn&#39;t be change</p><br><p>Then create my form Method POST<br>and using foreach loop create labels with the name of columns and input<br>field with its respective value <br>When I change something and click on Update<br>It submits.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/68">https://github.com/paul080791/IT202-006/pull/68</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/admin/edit_item.php?id=2">https://psg4-dev.herokuapp.com/Project/admin/edit_item.php?id=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163894115-96666929-ce85-4a97-83e7-93ab104cc313.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The name of the Product is the clickable item <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163893736-2ed54639-cc95-44d3-8145-160def4dd133.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>It an input but I can&#39;t be change. You have to click edit<br>in order to change in the Edit page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>Get the id from a $_GET variable and Select the row of this<br>id from RM_Item table<br>In the same way of Edit Page, in a foreach<br>loop creates labels with the column and its respective values<br>I use conditionals because<br>I my column visibility on my data base is a number so if<br>is 1 is going to write TRUE else False<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/72">https://github.com/paul080791/IT202-006/pull/72</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-prod.herokuapp.com/Project/Item_detail.php?id=2">https://psg4-prod.herokuapp.com/Project/Item_detail.php?id=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163897086-46dcc7ac-fe5a-4e9f-ac30-e9c67d9dc5ed.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing success message of adding a cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163900549-61329af5-239a-4685-b70c-176921b9f824.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing Cart page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163897143-a63642c5-cc7b-4290-8323-e6c1209e67cb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing error message adding to cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163900695-9aedc1f2-6084-4652-9596-cb5ba22c1a65.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing table of Cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>I use 1 cart per user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>When User clicks on add to cart, Get the Id of the item<br>and select from the RM_item table the specific one<br>and Insert it to the<br>cart table<br>Then I Select some of the data that I want to display<br>like the name(from RM_item) cost(from RM_Item) and desire quantity(from RM_Cart) of the user<br>.<br>Then in a foreach loop I create a forms with the<br>information for each item<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/71">https://github.com/paul080791/IT202-006/pull/71</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View (show subtotal, total, and the link to Product Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163900549-61329af5-239a-4685-b70c-176921b9f824.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing Cart page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>When User clicks on add to cart, Get the Id of the item<br>and select from the RM_item table the specific one<br>and Insert it to the<br>cart table<br>Then I Select some of the data that I want to display<br>like the name(from RM_item) cost(from RM_Item) and desire quantity(from RM_Cart) of the user<br>.<br>Then in a foreach loop I create a forms with the<br>information for each item on a <div><br>In order to get a subtotal I<br>multiply the desire quantity *  price and save it as sub<br>then inside<br>a  <div> I use it to display the sub total<br>For each iteration<br>I keep adding to the TOTAL and the display it when the foreach<br>loop is finish<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/71">https://github.com/paul080791/IT202-006/pull/71</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://psg4-dev.herokuapp.com/Project/cart.php">https://psg4-dev.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163909220-2d3325ee-4c25-4a99-b41f-8896d6c71d89.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before Update  <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163909368-0040fd17-7898-422e-a7ef-1ddd318aa7db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After Update Set both product quantity to 3<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163908778-4598d530-1ccb-4136-be47-dc0e6d9f546c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before handle 0 quantity<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163908882-d44ce403-1555-4ebc-a4e4-ecb866c19814.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After handle 0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163908957-1771b36d-988c-4359-8ae1-d776e61b5ecd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Handle negative<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>In a php file on partial folder I get the values from the<br>forms on the page. When user click Update, I get the desire number<br>of the input field. First I fetch the cart items for the specific<br>user. Then If the desire quantity is greater than stock quantity then I<br>Update the table with an UPDATE query.<br>In order to handle 0, I use<br>a conditional before the Updated query and check if desire quantity is 0.<br>If is 0, through a DELETE query I errase the specific row from<br>the table cart.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/paul080791/IT202-006/pull/71">https://github.com/paul080791/IT202-006/pull/71</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163910644-2abfe61c-8d67-4bf0-85b7-b6339fb37b0c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before deleting an item<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163910682-ba34aca2-6026-464b-ab04-2699d1caadfa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After deleting an item <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163910877-02709e0a-1291-47e4-aff0-caa06e8cabc7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before Clear Cart<br></p>
</td></tr>
<tr><td><img width="768px" src="After Clear Cart"/></td></tr>
<tr><td> <em>Caption:</em> <p><img src="https://user-images.githubusercontent.com/78453577/163910922-897f5f9b-73e3-445c-9a92-4811310e5da6.png" alt="image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>I get the id of the user from the form using $_POST[ ],<br>and then I use a Delete Query to delete the data of the<br>table of the specific user Id<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://github.com/paul080791/IT202-006/pull/71">https://github.com/paul080791/IT202-006/pull/71</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163914361-13f0c6ab-dccf-48cd-8602-093db5f25127.png"/></td></tr>
<tr><td> <em>Caption:</em> <p><a href="https://psg4-prod.herokuapp.com/Project/milestone2.md">https://psg4-prod.herokuapp.com/Project/milestone2.md</a><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/78453577/163914573-713aac97-c4f9-40b8-8932-69076165f66d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the issues c<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-006-S22/it202-milestone-2-shop-project/grade/psg4" target="_blank">Grading</a></td></tr></table>