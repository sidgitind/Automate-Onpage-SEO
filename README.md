# Automate-Onpage-SEO
Onpage SEO is one of the key aspect of Digital Marketing. This codeigniter based PHP library is meant to automate on page SEO

Using this library, you can dynamically generate 
a. Meta title
b. Meta description
c. Meta Kyewords
d. Face Open graph elements
e. Twitter share elements
f. Create sitemap XML files

based on a slug. The key is slug.

The steps are
1. Use the DB creation file to create slugs table
2. Now enter the slug value in this table whenever a new page is created
3. Use the site_Admin_controller view to find out the slugs for which the SEO elements are missing. Add them using the form. the data is saved in the DB
4. Add the meta_details.php file to your pages. Whenever the page is requested by the browser, the meta details are pulled from the DB and sent to the browser based on the slug. 
5. The Site_admin_controller has the methods to create sitemap files also based on the meta details in DB for a given slug.

The process to create slug is based on the work done by Eric Barnes - https://github.com/ericlbarnes/CodeIgniter-Slug-Library

You can simple copy the files in your codeinignter project and get going...

We plan to add schema creation for google search in the next release.

We are using this solution to automate on page SEO for our product - www.thinkcerti.com ( An AI drivern skills discovery platform).

Thanks to Meena Sutar and Bhagyashri Sutar for contributing the code. 
