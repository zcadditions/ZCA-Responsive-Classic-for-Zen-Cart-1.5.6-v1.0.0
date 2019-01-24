# ZCA-Responsive-Classic-for-Zen-Cart-1.5.6 - v1.0.0
This template is mobile friendly and uses Responsive CSS to allow sharing of a single template across multiple device types.  It uses PHP Mobile Detect to serve up the optimized layout based on device. It allows the designer to implement device-specific php, jquery, javascript or ajax.

# BEHIND THE SCENES
* Simplified Universal CSS
* Eliminates the responsive_mobile & responsive_tablet CSS files
* Adds a colors CSS file
* Utilizes Mobile Detect in more places for a better mobile layout (less CSS)

# ADMIN FEATURES
* Adds ability to set device specific columns per row for (centerboxes, categories, additional images & listing pages)
* Adds device specific sidebox control (now you can show sideboxes on mobile devices (manufacturers info & product notifications))

# CATALOG FEATURES
* Buy Now and Info buttons and sidebox and centerbox products
* Columnar Layout on Listing Pages
* Easy footer blocks (uses define pages or sideboxes)
* Photoswipe lightbox

<b>Donations</b> enable me to spend time on this project to further provide ongoing updates, features and requests.
<br />
<br />
Keep this project FREE, any size $$Donation$$ by the community is greatly appreciated. 
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=T4Z7FB6TCDQMG" target="_blank"> Make a Donation </a>

<br /><br />
<b class="mainColor">Install</b>
<br /><br />
<b>It is recommended that you always backup your Files and Database prior to installing any plugin or template.</b>
<br /><br />
1. Go to your host cpanel and select the backup wizard.<br />
2. Click on Backup.<br />
3. Click on Full Backup.<br />
4. Click on Generate Backup.<br />
<br />
Once the full backup of your account has been completed, you will receive an email at the address you specified.<br /><br />

<hr />
<b>Unzip and Prepare Package</b>
<br /><br />
1. You will need a File Extractor.<br />
2. Extract the package contents using your favorite File Extractor.<br />

3. Directories<br /><br />

Rename the <b>YOUR_ADMIN_FOLDER</b> to your actual admin folders name.<br /><br />

<b>Using as a standalone template</b><br />
<b>DO NOT</b> rename the responsive_default directories.<br /><br />

<b>Using as a template conversion</b><br />
<b>RENAME</b> the zca_diy_tpl_default directories to your template override directory name.<br /><br />

4. If you already have the above files in your template override directory, do not upload these files. Make the following file code merges to your existing files. Be sure to use a Plain Text Editor when editing these files.<br /><br />

Save these files.<br /><br />

<hr />
<b>Run the SQL Patch</b>
<br /><br />

1. Copy the package install_sql.txt contents.<br />
2. Go to your ADMIN.<br />
3. Hover over Tools and Click (Install SQL Patches).<br />
4. Paste the Copied code in the provided text area.<br />
5. Click the Send button.<br /><br />

<hr />
<b>Upload Package Files</b>
<br /><br />

1. You will need a FTP Client.<br /><br />

I use and will provide basic instructions using FTP with Filezilla.<br /><br />

2. Enter the address of the server, your username, password, and port if needed into the top of the Quickconnect bar.<br />
3. Once you are connected navigate to the directory on your local machine where you unzipped the package in the right side of window and navigate to your store root directory on your web host in the left side of the window.<br />
4. Drag the includes directory and drop it in the folder above the includes folder.<br /><br />


<hr />
<b>Configuration / Setup</b>
<br /><br />
1. Go to your ADMIN.<br />
2. Hover over Tools and Click (Template Selection). Skip this step, step 3 and 4 if using this template as a template conversion<br />
3. Click the "Edit" button.<br />
4. Choose <b>Responsive Default</b> from the select list and click update.<br /><br />

5. Hover over Tools and Click (Layout Boxes Controller).<br />

6. Scroll to the bottom and Click the "reset" button.<br /><br />

<b>Note:</b> You will now see 2 new columns (Tablet Status and Mobile Status), this is where you turn these side-boxes off for specific devices.<br /><br />

7. Hover over Configuration and Click (Layout Settings).<br />

<b>Note:</b> You will now see 4 new configuration.<br /><br />

<b>New Configuration(s) > Layout Settings</b>
<br />


| Title         | Value         | Description         |
| ------------- |:-------------:| -------------------:|
| Responsive Left Column Width | 2 | Set Width of Left Column, Default is 2, Total columns 12. Responsive Left, Center & Right Column Width must = 12 |
| Responsive Center Column Width | 8 | Set Width of Right Column, Default is 8, Total columns 12. Responsive Left, Center & Right Column Width must = 12 |
| Responsive Right Column Width | 2 | Set Width of Right Column, Default is 2, Total columns 12. Responsive Left, Center & Right Column Width must = 12 |
| Responsive Mobile Full Site Version Width | 980px | Set Width of Responsive Mobile Full Site Version, Default is 980px, To give mobile users same experience, this width should be the same max-width for the #mainWrapper selector in your stylesheet.css file |

<br />
<b>New Configuration(s) > Images</b>
<br />

| Title         | Value         | Description         |
| ------------- |:-------------:| -------------------:|
| Product Info - Number of Additional Images per Row (Mobile) | 1 | Product Info - Enter the number of additional images to display per row on (Mobile Devices). Default = 1 |
| Product Info - Number of Additional Images per Row (Tablet)| 2 | Product Info - Enter the number of additional images to display per row on (Tablet Devices). Default = 2 |

<br />
<b>New Configuration(s) > Product Info</b>
<br />

| Title         | Value         | Description         |
| ------------- |:-------------:| -------------------:|
| Also Purchased Products Columns per Row (Mobile) | 1 | Also Purchased Products Columns per row on (Mobile Devices). Default = 1 |
| Also Purchased Products Columns per Row (Tablet)| 2 | Also Purchased Products Columns per row on (Tablet Devices). Default = 2 |

<br />
<b>New Configuration(s) > Maximum Values</b>
<br />

| Title         | Value         | Description         |
| ------------- |:-------------:| -------------------:|
| Categories To List Per Row (Mobile) | 1 | How many categories to list per row on (Mobile Devices). Default = 1 |
| Categories To List Per Row (Tablet) | 2 | How many categories to list per row on (Tablet Devices). Default = 2 |

<br />
<b>New Configuration(s) > Index Listing</b>
<br />

| Title         | Value         | Description         |
| ------------- |:-------------:| -------------------:|
| Featured Products Columns per Row (Mobile) | 1 | Featured Products Columns per row on (Mobile Devices). Default = 1 |
| Featured Products Columns per Row (Tablet) | 2 | Featured Products Columns per row on (Tablet Devices). Default = 2 |
| New Products Columns per Row (Mobile) | 1 | New Products Columns per row on (Mobile Devices). Default = 1 |
| New Products Columns per Row (Tablet) | 2 | New Products Columns per row on (Tablet Devices). Default = 2 |
| Special Products Columns per Row (Mobile) | 1 | Special Products Columns per row on (Mobile Devices). Default = 1 |
| Special Products Columns per Row (Tablet) | 2 | Special Products Columns per row on (Tablet Devices). Default = 2 |

<br />

<hr />
<b class="mainColor">Uninstall</b>
<br /><br />
1. Remove all <i class="zca">New</i> files from the package that you uploaded. <br />
2. Restore any <i class="blue">Existing</i> or <i class="red">Core</i> files in the package that you merged. <br />
3. Copy the packages uninstall_sql.txt contents.<br />
4. Go to your ADMIN.<br />
5. Hover over Tools and Click (Install SQL Patches).<br />
6. Paste the Copied code in the provided text area.<br />
7. Click the Send button.<br />
</p>
</div>
<!-- ************************************************************************************** -->
