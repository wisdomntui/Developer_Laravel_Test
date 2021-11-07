
# Developer_Laravel_Test
Recruitment Developer Test
# Requirements
This is a Basic Laravel 8 Installation
You are expected to complete **any** of the following task sets that you are most comfortable with :
#Task 1 (Junior)
1. Create Local Scope on UserModel (User.php) To fetch only users who are above 14 years
2. Add a One To One relationship on the User Model that links to the Profile Model
3. Write a class in Actions Folder titled CreateProfileAction that when called from the controller as seen in ProfileController will create the authenticated user profile directly from the user model using the relationship created in 1 above
4. Create a command to clean up the user database everyday by 12:00am if the user's email is not verified
5. You have two tables, Meal and Blogs with  only one category table. Create a table to morph these two tables together

#Task 2 (Mid-Level)
1. Create a QueryFilter using Laravel **inbuilt Pipelining Feature** and make the code in BlogController@search to work
2. You have a twitter class as shown in the file, you are expected to send a message. but due to restrictions, you are only to send at most one message every minute. once a request hits the MealAgregatorAPIcontroller, assume it would send a loop of requests because count is always greater thatn 50. Using jobs, schedule to ensure that the action in that controller is called once per minute.
3. You have two tables, Meals and Blogs sharing the same category table. Create a table to morph these two tables together.
4. Write a controller MealController@create method, to create a meal and a feature test to verify that meal creation is returning a 200 response and a meal is actually been added
