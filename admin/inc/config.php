<?php
	class foliogine_liteConfig{
		public static $admin_page_menu_name ;
		public static  $admin_page_title 	;
		public static  $admin_page_header 	;
		public static  $admin_template_directory ;
		public static  $admin_template_directory_uri ;
		public static  $admin_uri 	;
		public static $admin_path  ;
		public static  $menu_slug 	;
		public static $structure;
		public static function init(){

			$all_pages = array();
			$default_pages = array();
			$pages = get_pages();
			foreach ( $pages as $page ):
				$all_pages[$page->ID] = $page->post_title;
				array_push($default_pages, $page->ID);
			endforeach;
            $all_pages[0] = "FrontPage";
            array_push($default_pages, 0);
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Theme Options";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/';
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"foliogine_lite_theme_options";
			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>__("General options",'foliogine-lite'),
							 "options"=>array(

								/* Logo */
								array(
									"type"=>"group",
									"name"=>__("Logo",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"image",
											"name"=>__("Logo",'foliogine-lite'),
											"description"=>__("Logo",'foliogine-lite'),
											"id"=>"logo_image",
											"default"=> ""
										),
										array(
											"type"=>"input_text",
											"name"=>__("Logo text",'foliogine-lite'),
											"description"=>__("Logo text",'foliogine-lite'),
											"id"=>"logo_text",
											"default"=>""
										)
									)
								),
								/* Download brochure section */
								array(
									"type"=>"group",
									"name"=>__("Download brochure section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"download_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide download brochure section in the archive page.",'foliogine-lite'),
											"id"=>"download_archive",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide download brochure section in the search page.",'foliogine-lite'),
											"id"=>"download_search",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Download brochure text left side",'foliogine-lite'),
											"description"=>__("Enter a text to appear in the left side of the download brochure button.",'foliogine-lite'),
											"id"=>"download_text",
											"default"=>""
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title for the Download brochure button",'foliogine-lite'),
											"description"=>__("Enter a title to appear on the download brochure button.",'foliogine-lite'),
											"id"=>"download_title",
											"default"=>""
										),
										array(
											"type"=>"input_text",
											"name"=>__("Link for the Download brochure button",'foliogine-lite'),
											"description"=>__("Enter the link of the download brochure button.",'foliogine-lite'),
											"id"=>"download_url",
											"default"=>""
										)
									)
								),
								/* Slider section */
								array(
									"type"=>"group",
									"name"=>__("Slider section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"slider_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide slider section in the archive page.",'foliogine-lite'),
											"id"=>"slider_archive",
											"options"=>array(
												"hide"=>"Hide",
												"show"=>"Show"
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide slider section in the search page.",'foliogine-lite'),
											"id"=>"slider_search",
											"options"=>array(
												"hide"=>"Hide",
												"show"=>"Show"
											),
											"default"=>"hide"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Slider big title",'foliogine-lite'),
											"description"=>__("Enter a big title for the slider.",'foliogine-lite'),
											"id"=>"slider_bigtitle",
											"default"=>__('Hello and welcome, we are ThemeIsle, browse our portfolio.','foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Slider title",'foliogine-lite'),
											"description"=>__("Enter a title for the slider.",'foliogine-lite'),
											"id"=>"slider_title",
											"default"=>__('Professional WordPress theme','foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Slider subtitle",'foliogine-lite'),
											"description"=>__("Enter a subtitle for the slider.",'foliogine-lite'),
											"id"=>"slider_subtitle",
											"default"=>__('Fully responsive and retina ready.','foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Slide image 1",'foliogine-lite'),
											"description"=>__("Slide image 1",'foliogine-lite'),
											"id"=>"slide_image1",
											"default"=> get_template_directory_uri().'/img/img-on-screen.jpg'
										),
										array(

											"type"=>"image",
											"name"=>__("Slide image 2",'foliogine-lite'),
											"description"=>__("Slide image 2",'foliogine-lite'),
											"id"=>"slide_image2",
											"default"=> get_template_directory_uri().'/img/image-on-screen-colors.jpg'
										),
										array(

											"type"=>"image",
											"name"=>__("Slide image 3",'foliogine-lite'),
											"description"=>__("Slide image 3",'foliogine-lite'),
											"id"=>"slide_image3",
											"default"=> get_template_directory_uri().'/img/img-on-screen-mobile-tablet.jpg'
										)
									)
								),

								/* Our services */
								array(
									"type"=>"group",
									"name"=>__("Our services section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"services_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide our services section in the archive page.",'foliogine-lite'),
											"id"=>"services_archive",
											"options"=>array(
												"hide"=>"Hide",
												"show"=>"Show"
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide our services section in the search page.",'foliogine-lite'),
											"id"=>"services_search",
											"options"=>array(
												"hide"=>"Hide",
												"show"=>"Show"
											),
											"default"=>"hide"
										),
										array(

											"type"=>"image",
											"name"=>__("Image 1",'foliogine-lite'),
											"description"=>"",
											"id"=>"services_image1",
											"default"=> get_template_directory_uri().'/img/icon-puzzle.png'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title 1",'foliogine-lite'),
											"description"=>__("Enter the first service title",'foliogine-lite'),
											"id"=>"services_title1",
											"default"=>__("Service 1",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Text 1",'foliogine-lite'),
											"description"=>__("Enter the first service text",'foliogine-lite'),
											"id"=>"services_text1",
											"default"=>__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mi nunc, consequat quis tempor faucibus, gravida id lorem. ",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Image 2",'foliogine-lite'),
											"description"=>"",
											"id"=>"services_image2",
											"default"=> get_template_directory_uri().'/img/icon-work.png'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title 2",'foliogine-lite'),
											"description"=>__("Enter the second service title",'foliogine-lite'),
											"id"=>"services_title2",
											"default"=>__("Service 2",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Text 2",'foliogine-lite'),
											"description"=>__("Enter the second service text",'foliogine-lite'),
											"id"=>"services_text2",
											"default"=>__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mi nunc, consequat quis tempor faucibus, gravida id lorem. ",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Image 3",'foliogine-lite'),
											"description"=>"",
											"id"=>"services_image3",
											"default"=> get_template_directory_uri().'/img/icon-direnction.png'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title 3",'foliogine-lite'),
											"description"=>__("Enter the third service title",'foliogine-lite'),
											"id"=>"services_title3",
											"default"=>__("Service 3",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Text 3",'foliogine-lite'),
											"description"=>__("Enter the third service text",'foliogine-lite'),
											"id"=>"services_text3",
											"default"=>__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mi nunc, consequat quis tempor faucibus, gravida id lorem. ",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Image 4",'foliogine-lite'),
											"description"=>"",
											"id"=>"services_image4",
											"default"=> get_template_directory_uri().'/img/icon-friends.png'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title 4",'foliogine-lite'),
											"description"=>__("Enter the fourth service title",'foliogine-lite'),
											"id"=>"services_title4",
											"default"=>__("Service 4",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Text 4",'foliogine-lite'),
											"description"=>__("Enter the fourth service text",'foliogine-lite'),
											"id"=>"services_text4",
											"default"=>__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mi nunc, consequat quis tempor faucibus, gravida id lorem. ",'foliogine-lite')
										)
									)
								),
								/* our team */
								array(
									"type"=>"group",
									"name"=>__("Our team section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"team_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide our team section in the archive page.",'foliogine-lite'),
											"id"=>"team_archive",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide our team section in the search page.",'foliogine-lite'),
											"id"=>"team_search",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(

											"type"=>"image",
											"name"=>__("Person image 1",'foliogine-lite'),
											"description"=>"",
											"id"=>"team_image1",
											"default"=> get_template_directory_uri().'/img/team-img1.jpg'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Name 1",'foliogine-lite'),
											"description"=>__("Enter the first person's name to appear in the our team area",'foliogine-lite'),
											"id"=>"team_name1",
											"default"=>__("John Doe",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Job 1",'foliogine-lite'),
											"description"=>__("Enter the first person's job to appear in the our team area",'foliogine-lite'),
											"id"=>"team_job1",
											"default"=>__("CEO",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Person image 2",'foliogine-lite'),
											"description"=>"",
											"id"=>"team_image2",
											"default"=> get_template_directory_uri().'/img/team-img1.jpg'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Name 2",'foliogine-lite'),
											"description"=>__("Enter the second person's name to appear in the our team area",'foliogine-lite'),
											"id"=>"team_name2",
											"default"=>__("John Doe",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Job 2",'foliogine-lite'),
											"description"=>__("Enter the second person's job to appear in the our team area",'foliogine-lite'),
											"id"=>"team_job2",
											"default"=>__("CEO",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Person image 3",'foliogine-lite'),
											"description"=>"",
											"id"=>"team_image3",
											"default"=> get_template_directory_uri().'/img/team-img1.jpg'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Name 3",'foliogine-lite'),
											"description"=>__("Enter the third person's name to appear in the our team area",'foliogine-lite'),
											"id"=>"team_name3",
											"default"=>__("John Doe",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Job 3",'foliogine-lite'),
											"description"=>__("Enter the third person's job to appear in the our team area",'foliogine-lite'),
											"id"=>"team_job3",
											"default"=>__("CEO",'foliogine-lite')
										),
										array(

											"type"=>"image",
											"name"=>__("Person image 4",'foliogine-lite'),
											"description"=>"",
											"id"=>"team_image4",
											"default"=> get_template_directory_uri().'/img/team-img1.jpg'
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Name 4",'foliogine-lite'),
											"description"=>__("Enter the fourth person's name to appear in the our team area",'foliogine-lite'),
											"id"=>"team_name4",
											"default"=>__("John Doe",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Person Job 4",'foliogine-lite'),
											"description"=>__("Enter the fourth person's job to appear in the our team area",'foliogine-lite'),
											"id"=>"team_job4",
											"default"=>__("CEO",'foliogine-lite')
										)


									)
								),
								/* testimonials */
								array(
									"type"=>"group",
									"name"=>__("Testimonials section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"testimonial_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide testimonials section in the archive page.",'foliogine-lite'),
											"id"=>"testimonial_archive",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide testimonials section in the search page.",'foliogine-lite'),
											"id"=>"testimonial_search",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title",'foliogine-lite'),
											"description"=>__("Enter the title to appear in the testimonials area",'foliogine-lite'),
											"id"=>"testimonial_title",
											"default"=>__("Lorem Ipsum",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Content",'foliogine-lite'),
											"description"=>__("Enter the text to appear in the testimonials area",'foliogine-lite'),
											"id"=>"testimonial_content",
											"default"=>__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mi nunc, consequat quis tempor faucibus, gravida id lorem. ",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Author",'foliogine-lite'),
											"description"=>__("Enter the author to appear in the testimonials area",'foliogine-lite'),
											"id"=>"testimonial_author",
											"default"=>__("John Doe",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Info about the author",'foliogine-lite'),
											"description"=>__("Enter a small piece of information to appear after the author name in the testimonials area",'foliogine-lite'),
											"id"=>"testimonial_info",
											"default"=>__("CEO",'foliogine-lite')
										)
									)
								),
								/* our skills */
								array(
									"type"=>"group",
									"name"=>__("Our skills section options",'foliogine-lite'),
									"options"=>	array(
										array(

											"type"=>"multiselect",
											"name"=>__("Select all the pages where you want this section to appear",'foliogine-lite'),
											"description"=>__("Hold down the control (ctrl) button to select multiple options",'foliogine-lite'),
											"id"=>"the_skill_select",
											"options"=> $all_pages,
											"default"=> $default_pages
										),
										array(
											"type"=>"select",
											"name"=>__("Archive page",'foliogine-lite'),
											"description"=>__("Show or hide download brochure section in the archive page.",'foliogine-lite'),
											"id"=>"skill_archive",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"select",
											"name"=>__("Search page",'foliogine-lite'),
											"description"=>__("Show or hide download brochure section in the search page.",'foliogine-lite'),
											"id"=>"skill_search",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"hide"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Title",'foliogine-lite'),
											"description"=>__("Enter the title to appear in the skills area",'foliogine-lite'),
											"id"=>"skill_title",
											"default"=>__("Our skills",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("First skill text",'foliogine-lite'),
											"description"=>__("Enter the text to appear in the first skill area",'foliogine-lite'),
											"id"=>"skill_text1",
											"default"=>__("CSS",'foliogine-lite')
										),
										array(
											"type"=>"input_number",
											"name"=>__("First skill value",'foliogine-lite'),
											"description"=>__("Enter the value for the first skill area",'foliogine-lite'),
											"id"=>"skill_val1",
											"max"=>100,
											"min"=>1,
											"step"=>1,
											"default"=>"80"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Second skill text",'foliogine-lite'),
											"description"=>__("Enter the text to appear in the second skill area",'foliogine-lite'),
											"id"=>"skill_text2",
											"default"=>__("HTML",'foliogine-lite')
										),
										array(
											"type"=>"input_number",
											"name"=>__("Second skill value",'foliogine-lite'),
											"description"=>__("Enter the value for the second skill area",'foliogine-lite'),
											"id"=>"skill_val2",
											"max"=>100,
											"min"=>1,
											"step"=>1,
											"default"=>"90"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Third skill text",'foliogine-lite'),
											"description"=>__("Enter the text to appear in the third skill area",'foliogine-lite'),
											"id"=>"skill_text3",
											"default"=>__("jQuery",'foliogine-lite')
										),
										array(
											"type"=>"input_number",
											"name"=>__("Third skill value",'foliogine-lite'),
											"description"=>__("Enter the value for the third skill area",'foliogine-lite'),
											"id"=>"skill_val3",
											"max"=>100,
											"min"=>1,
											"step"=>1,
											"default"=>"100"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Fourth skill text",'foliogine-lite'),
											"description"=>__("Enter the text to appear in the fourth skill area",'foliogine-lite'),
											"id"=>"skill_text4",
											"default"=>__("Photoshop",'foliogine-lite')
										),
										array(
											"type"=>"input_number",
											"name"=>__("Fourth skill value",'foliogine-lite'),
											"description"=>__("Enter the value for the fourth skill area",'foliogine-lite'),
											"id"=>"skill_val4",
											"max"=>100,
											"min"=>1,
											"step"=>1,
											"default"=>"80"
										),
									)
								)
							)
						),
						array(
							 "type"=>"tab",
							 "name"=>__("Blog + Search + Archive options",'foliogine-lite'),
							 "options"=>array(
										array(

											"type"=>"radio",
											"name"=>__("Layout for blog page",'foliogine-lite'),
											"description"=>__("Choose the layout for the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"layout_blog",
											"options"=>array(
												"valoare1"=>__("Left sidebar",'foliogine-lite'),
												"valoare2"=>__("Right sidebar",'foliogine-lite'),
												"valoare3"=>__("Both left and right sidebars",'foliogine-lite')
											),
											"default"=>"valoare1"
										),
										array(
											"type"=>"select",
											"name"=>__("Featured image",'foliogine-lite'),
											"description"=>__("Show or hide featured image in the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"featured_image",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Date",'foliogine-lite'),
											"description"=>__("Show or hide date in the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"date",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Category",'foliogine-lite'),
											"description"=>__("Show or hide category in the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"category",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Author",'foliogine-lite'),
											"description"=>__("Show or hide author in the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"author",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Tags",'foliogine-lite'),
											"description"=>__("Show or hide tags in the blog page, the archive page and the search page",'foliogine-lite'),
											"id"=>"tags",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										)
							)
						),
						array(
							 "type"=>"tab",
							 "name"=>__("Single post options",'foliogine-lite'),
							 "options"=>array(
										array(

											"type"=>"radio",
											"name"=>__("Layout for single post",'foliogine-lite'),
											"description"=>__("Choose the layout for the single post",'foliogine-lite'),
											"id"=>"layout_single",
											"options"=>array(
												"valoare1"=>__("Left sidebar",'foliogine-lite'),
												"valoare2"=>__("Right sidebar",'foliogine-lite'),
												"valoare3"=>__("Both left and right sidebars",'foliogine-lite')
											),
											"default"=>"valoare1"
										),
										array(
											"type"=>"select",
											"name"=>__("Featured image",'foliogine-lite'),
											"description"=>__("Show or hide featured image in the single post",'foliogine-lite'),
											"id"=>"featured_image_single",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Date",'foliogine-lite'),
											"description"=>__("Show or hide date in the single post",'foliogine-lite'),
											"id"=>"date_single",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Category",'foliogine-lite'),
											"description"=>__("Show or hide category in the single post",'foliogine-lite'),
											"id"=>"category_single",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Author",'foliogine-lite'),
											"description"=>__("Show or hide author in the single post",'foliogine-lite'),
											"id"=>"author_single",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Tags",'foliogine-lite'),
											"description"=>__("Show or hide tags in the single post",'foliogine-lite'),
											"id"=>"tags_single",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										),
										array(
											"type"=>"select",
											"name"=>__("Comments",'foliogine-lite'),
											"description"=>__("Show or hide comments in the single post",'foliogine-lite'),
											"id"=>"comments",
											"options"=>array(
												"hide"=>__("Hide",'foliogine-lite'),
												"show"=>__("Show",'foliogine-lite'),
											),
											"default"=>"show"
										)
							)
						),
						array(
							 "type"=>"tab",
							 "name"=>__("Footer options",'foliogine-lite'),
							 "options"=>array(
										array(
											"type"=>"select",
											"name"=>__("Footer columns",'foliogine-lite'),
											"description"=>__("How many columns should be displayed in your footer",'foliogine-lite'),
											"id"=>"footer_columns",
											"options"=>array(
												"doi"=>__("Two",'foliogine-lite'),
												"trei"=>__("Three",'foliogine-lite')
											),
											"default"=>"doi"
										),
										array(

											"type"=>"image",
											"name"=>__("Logo",'foliogine-lite'),
											"description"=>"",
											"id"=>"logo_footer",
											"default"=>""
										),
										array(
											"type"=>"input_text",
											"name"=>__("Address",'foliogine-lite'),
											"description"=>"",
											"id"=>"address",
											"default"=>__("Bucharest, Unirii 23, Romania",'foliogine-lite')
										),
										array(
											"type"=>"input_text",
											"name"=>__("Twitter Link",'foliogine-lite'),
											"description"=>__("Enter your twitter account link. If you leave this blank the twitter link in the footer wont be displayed",'foliogine-lite'),
											"id"=>"twitter",
											"default"=>"#"
										),
										array(
											"type"=>"input_text",
											"name"=>__("RSS link",'foliogine-lite'),
											"description"=>__("Enter your RSS link. If you leave this blank the RSS link in the footer wont be displayed",'foliogine-lite'),
											"id"=>"rss",
											"default"=>"#"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Linkedin Link",'foliogine-lite'),
											"description"=>__("Enter your Linkedin link. If you leave this blank the linkedin link in the footer wont be displayed",'foliogine-lite'),
											"id"=>"linkedin",
											"default"=>"#"
										),
										array(
											"type"=>"input_text",
											"name"=>__("Copyright",'foliogine-lite'),
											"description"=>__("Enter your copyright. If you leave this blank the copyright in the footer wont be displayed",'foliogine-lite'),
											"id"=>"copyright",
											"default"=>""
										),
							)
						),
						array(
							 "type"=>"tab",
							 "name"=>__("Contact options",'foliogine-lite'),
							 "options"=>array(

								array(
									"type"=>"input_text",
									"name"=>__("Email address",'foliogine-lite'),
									"description"=>__("Enter your email address to appear in footer and contact page.If you leave this blank the email address and the contact form wont be displayed",'foliogine-lite'),
									"id"=>"email",
									"default"=>"support@themeisle.com"
								),
								array(
									"type"=>"input_text",
									"name"=>__("Phone number",'foliogine-lite'),
									"description"=>__("Enter your phone number to appear in footer and contact page.If you leave this blank the phone number wont be displayed",'foliogine-lite'),
									"id"=>"phone",
									"default"=>"0043 889 778 321"
								)
							)
						)

					);

		}

	}
