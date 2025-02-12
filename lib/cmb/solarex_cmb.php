<?php

function solerex_cmb_features()
{
  // $blog_details = new_cmb2_box(array(
  //   "id" => "solerex_features",
  //   "title" => esc_html__("Blog Details", "solerex"),
  //   "object_types" => "post",
  // ));
  // $blog_details->add_field(array(
  //   "id" => "feature_image",
  //   "name" => esc_html__("Convert Image", "cmb2"),
  //   "decription" => esc_html__("Upload a cover image", "cmb2"),
  //   "type" => "file",

  // ));

  // $services = new_cmb2_box(array(
  //   "id" => "solerex_services",
  //   "name" => esc_html__("Services", "Solerex"),
  //   "object_types" => "services",
  // ));

  // $services->add_field(array(
  //   "id" => "service_image",
  //   "name" => esc_html__("Convert Image", "cmb2"),
  //   "description" => esc_html__("Upload a cover image", "cmb2"),
  //   "type" => "file",
  // ));

  // $team = new_cmb2_box(array(
  //   "id" => "solerex_team",
  //   "title" => esc_html__("Details", "Solerex"),
  //   "object_types" => "team",
  // ));


  // $team->add_field(array(
  //   "id" => "team_role",
  //   "name" => esc_html__("Role", "cmb2"),
  //   "type" => "text",
  // ));

  // $team->add_field(array(
  //   "id" => "about_team_member",
  //   "name" => esc_html__("About", "cmb2"),
  //   "type" => "textarea",
  // ));

  // $team->add_field(array(
  //   "id" => "team_member_responsibilities",
  //   "name" => esc_html__("Key Responsibilities", "cmb2"),
  //   "type" => "textarea",
  // ));

  // $team->add_field(array(
  //   "id" => "team_achievements",
  //   "name" => esc_html__("Achievements", "cmb2"),
  //   "type" => "textarea",
  // ));

  // $team->add_field(array(
  //   "id" => "team_fun_fact",
  //   "name" => esc_html__("Fun Fact", "cmb2"),
  //   "type" => "textarea",
  // ));

  // $team->add_field(array(
  //   "id" => "team_quote",
  //   "name" => esc_html__("Why They Love Solar Energy", "cmb2"),
  //   "type" => "textarea",
  // ));

  // $team->add_field(array(
  //   "id" => "team_email",
  //   "name" => esc_html__("Email", "cmb2"),
  //   "type" => "text_email",
  // ));

  // $team->add_field(array(
  //   "id" => "team_phone",
  //   "name" => esc_html__("Phone", "cmb2"),
  //   "type" => "text",
  // ));

  // $team->add_field(array(
  //   "id" => "team_facebook_link",
  //   "name" => esc_html__("Facebook Link", "cmb2"),
  //   "type" => "text_url",
  // ));

  // $team->add_field(array(
  //   "id" => "team_twitter_link",
  //   "name" => esc_html__("Twitter Link", "cmb2"),
  //   "type" => "text_url",
  // ));
  
  // $team->add_field(array(
  //   "id" => "team_linkedin_link",
  //   "name" => esc_html__("Linkedin Link", "cmb2"),
  //   "type" => "text_url",
  // ));
 
  // $team->add_field(field: array(
  //   "id" => "team_youtube_link",
  //   "name" => esc_html__("Youtube Link", "cmb2"),
  //   "type" => "text_url",
  // ));
  // $team->add_field(array(
  //   "id" => "team_instagram_link",
  //   "name" => esc_html__("Instagram Link", "cmb2"),
  //   "type" => "text_url",
  // ));

}


add_action("cmb2_init", "solerex_cmb_features");