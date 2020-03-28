$(document).ready(function()

{
  document.querySelector("#all_posts button").classList.add("active");
  document.querySelector("#all_posts button h4").classList.add("active_h4");
  document.querySelector("#all_posts button i").classList.add("active_i");

});

$(".div_button").click(function()
{
// Try test

$(".div_button button").removeClass('active');
$(".div_button button h4").removeClass('active_h4');
$(".div_button button i").removeClass('active_i');
$(this).find("button").addClass('active');
$(this).find("button h4").addClass('active_h4');
$(this).find("button i").addClass('active_i');

// --- Try test end
let list = document.querySelectorAll(".main_content");



for(i = 0;i<list.length;i++)
{
  list[i].style.display = "none";
}
let id = this.id;
let each_text = $(this).find("h4")[0].innerHTML;

document.getElementById("top_text").innerHTML = each_text;
let newid = id + "_div";
let element = document.getElementById(newid);

element.style.display = "flex";
});


//this is the javascript code for the all post page


let status = $(".status");


for(j = 0;j<status.length;j++)
{
  if(status[j].innerHTML == "Published")
  {
    status[j].style.color = "green";
  }

  else {
    status[j].style.color = "red";
  }
}


// let manage_buttons = $("#manage_post_div").find("a");
//
// for(i =0;i<manage_buttons.length;i++)
// {
//   if(manage_buttons[i].innerHTML == "Delete")
//   {
//     manage_buttons[i].style.background = "red";
//   }
//
//   else if(manage_buttons[i].innerHTML == "Edit")
//   {
//     manage_buttons[i].style.background = " #7757B2";
//   }
//
//   else {
//     manage_buttons[i].style.background = "green";
//   }
// }



// $(document).ready(function()
// {
//   if (document.referrer == "http://localhost/webkriti/login.php" || "http://localhost/webkriti/register.php")
//   {
//     document.getElementById("blog_settings_div").style.display = "flex";
//   }
//
// // else if(document.referrer == "http://localhost/webkriti/blogall.php" || "http://localhost/webkriti/blogeach.php" )
// // {
// //   document.getElementById("all_posts_div").style.display = "flex";
// //   document.getElementById("blog_settings_div").style.display = "none";
// //
// //
// // }
//   else {
//     // document.getElementById("blog_settings_div").style.display = "none";
//     document.getElementById("all_posts_div").style.display = "flex";
//   }
// });


// This is the improved code for the colouring of the menu buttons upon being active:

// $(".div_button").click(function()
// {
//
//
//     let myid = this.id + "_div";
//
//     let myidfull = "#" + myid;
//
//     // alert(myidfull);
//
//     let temp = $(myid).find("button");
//
//     if(document.getElementById(myidfull).style.display == "flex")
//     {
//     for(i = 0;i<temp.length;i++)
//     {
//       temp[i].style.color = "red";
//     }
//
//     }



// let t = $(".category-selector").find("option");

// let t = $(".category-selector").find("option");
// let m = $(".category-selector");
//
// // alert(t.innerHTML);
//
//
// let input_custom = document.getElementById("custom_category");
//
// for(i=0;i<t.length;i++)
// {
//     // alert(t[i].getAttribute("value"));
//   if(m.innerHTML == "Custom")
//   {
//     alert("working");
//     input_custom.style.display = "block";
//   }
//
//   else {
//       input_custom.style.display = "none";
//   }
// }





//this is for custom cataegory selector
