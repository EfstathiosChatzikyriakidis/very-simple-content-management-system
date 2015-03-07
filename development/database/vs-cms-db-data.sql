INSERT INTO adjust_info VALUES (1, 'username@domain.com', 'username@domain.com', 'username@domain.com', 'username@domain.com', 'http://www.youraddress.com/', 5656, 1, 'The title of the link.', 'Content Categories.', '[ Here, you should input the message of the mainframe ]', 30, 5, 5, 4, 4, 'Here you should input your html welcome data.', -14);

INSERT INTO banner_links VALUES (1, 'http://www.webaddress.com/', 'example-banner-graphic.png', 'The title of the banner link 1.');
INSERT INTO banner_links VALUES (2, 'http://www.webaddress.com/', 'example-banner-graphic.png', 'The title of the banner link 2.');

INSERT INTO components_status VALUES (1, 'footer_part', 1);
INSERT INTO components_status VALUES (2, 'left_column', 1);
INSERT INTO components_status VALUES (4, 'graphic_links', 1);
INSERT INTO components_status VALUES (5, 'banner_links', 1);
INSERT INTO components_status VALUES (6, 'choose_template', 1);

INSERT INTO content_categories VALUES (1, 0, 'The title of the category 1.', 'no', 'The description of the category 1.', 1);

INSERT INTO content_items VALUES (1, 1, 'no', 'The title of the content 1.', 'The description of the content 1.', 'The body text of the content 1.', 214, 1, '2007-08-27', '16:55:54', '2008-05-18', '19:09:23');
INSERT INTO content_items VALUES (2, 1, 'no', 'The title of the content 2.', 'The description of the content 2.', 'The body text of the content 2.', 215, 1, '2007-08-28', '16:55:55', '2008-05-19', '19:09:24');

INSERT INTO corner_items VALUES (1, 'index.php', 'top-left-graphic.png', 'The title of the top left corner link.', 'top', 'left');
INSERT INTO corner_items VALUES (2, 'index.php', 'top-center-graphic.png', 'The title of the top center corner link.', 'top', 'center');
INSERT INTO corner_items VALUES (3, 'index.php', 'top-right-graphic.png', 'The title of the top right corner link.', 'top', 'right');

INSERT INTO graphic_links VALUES (1, 'no', 'example-link-graphic.png', 'The title of the graphic link 1.');
INSERT INTO graphic_links VALUES (2, 'no', 'example-link-graphic.png', 'The title of the graphic link 2.');
INSERT INTO graphic_links VALUES (3, 'no', 'example-link-graphic.png', 'The title of the graphic link 3.');

INSERT INTO text_links VALUES (1, 'http://www.webaddress.com/', 'The title of the text link 1.', 'The text of the text link 1.');
INSERT INTO text_links VALUES (2, 'http://www.webaddress.com/', 'The title of the text link 2.', 'The text of the text link 2.');
