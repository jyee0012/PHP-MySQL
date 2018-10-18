current problem:
when logging in from a root page, the login will automatically redirect you within the admin folder
so when logging in at the index or companyprofile page, 
login will attempt to redirect you to the admin/index or admin/companyprofile.

one possible solution is to get login to redirect you to the file from the root
so for all edit and inserts, then they will need admin/ prefix for their files