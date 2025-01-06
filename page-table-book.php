<?php

 /*
Template Name: Contact Page
*/

 

get_header();
?>
<script>
//     const date = new Date();
//   let day = date.getDate();
//   let  year = date.getYear()
//   let month= date.getMonth()
//   month = month + 1;
//   year = 1900 + year;
//      alert(year+"-"+month+"-"+day)
</script>

<div class="content-area">
    <main>
        <div class="container">
            <h1 class="text-[2rem]">Tisch reservation</h1>
            <p>Bitte geben Sie die Informationen zur Buchung ein</p>
            <div id="form-wrapper">

                <form action="" method="post" id="ajax-1contact" class="ajax" enctype="multipart/form-data">
<div>
                    <label><b>Name</b></label>

                    <input type="text" placeholder="Enter Your Name" id="name" name="name" required class="name">
</div><div>
                    <label><b>Email</b></label>

                    <input type="email" placeholder="Enter your Email" id="email" name="email" required class="email">
            
                    </div><div>
                                <label><b>Select date</b></label>

                    <input type="date" id="book_date" name="book_date" class="book_date" value="2025-01-01" min="2025-01-01"
                        max="2025-12-31" />
                        </div><div>
                    <!-- <input type="date" 
               id="Test_DatetimeLocal" 
               min="2025-01-01" 
               max="2025-12-31" 
               step="1"> -->
               </div><div>
                    <label><b>Select time</b></label>
                    <input type="time" id="book_time" name="book_time" class="book_time">
                    </div><div>
                    <!-- <label><b>Message</b></label>

                    <textarea placeholder="Your message here...." tabindex="5" class="message" id="message"
                        name="message" required></textarea> -->

                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>

                    <div class="success_msg" style="display: none">Message
                        Sent Successfully</div>

                    <div class="error_msg" style="display: none">Message
                        Not Sent, There is some error.</div>

                </form>

            </div><!-- end of form wrapper-->
        </div>
    </main>
</div>
<?php get_footer(); ?>