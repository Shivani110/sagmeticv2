@extends('masterlayout.website_frontend.layout')
@section('content')
<section class="banner-sec" id="banner">
    <div class="container">
        <div class="banner-content row">
            <div class="highend-sec col-lg-6 col-sm-6 ">
                <div>
                    <h1>High End 
                        Creative Agency</h1>
                        <p>As a high-end creative agency, we act as your technology partners, leveraging our expertise to transform your ideas into reality while taking care of all your technical challenges, leaving you free to concentrate on your core business.</p>
                </div>
                <div class="button">
                    <a href="#contact" class="btn" >Get In Touch   <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon.svg')}}" alt="image"></a>
                </div>
         </div>
         <div class="bannerimg-sec col-lg-6 col-sm-6">
           <img class="img-fluid" src="{{asset('website_frontend/images/banner-sec.png')}}" alt=" About Sagmetic Infotech">
        </div>
      </div>
      </div>
  </section>
<section class="services-sec" id="services">
  <div class="container">
    <div class="services-content">
      <div class="services-heading" >
        <div class="red-heading top-heading" data-aos="zoom-in-up">
          <h5>What we can do for you</h5>
        </div>
        <h2>Services we can help you with</h2>
        <p>We offer a wide range of services designed to provide your business with visually stunning, innovative, and feature-packed web solutions.</p>
      </div>
      <div class="services-box">
        <div class="row services">
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon designing">
                <i class="bi bi-pencil-square"></i>
                </div>
                <div class="services-info">
                  <h3>Web Designing</h3>
                  <p>Struggling with a poorly designed e-commerce website? Sagmetic Infotech offers unique and specialized website designs, blending advanced technology and expert know-how. Boost customer retention, achieve online marketing goals.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon development">
                <i class="bi bi-code-square"></i>
                </div>
                <div class="services-info">
                  <h3>Web Development</h3>
                  <p>Sagmetic Infotech provides top-notch web development services, crafting stunning, functional websites tailored to meet customer needs. Leveraging CMS and e-commerce platforms, we guarantee exceptional outcomes for online success.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon search">
                <i class="bi bi-search"></i>
                </div>
                <div class="services-info">
                  <h3>Search Engine Optimization</h3>
                  <p>We offers top-notch SEO services in India. Our skilled team uses years of experience to boost your web portal's ranking with targeted keywords, tailored analytics, and modern tools. Trust us to create a winning SEO strategy for your brand.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon ecommerce">
                <i class="bi bi-cart4"></i>
                </div>
                <div class="services-info">
                  <h3>Ecommerce Solutions</h3>
                  <p>For a remarkable, responsive, mobile-friendly e-commerce site, reach out to our skilled web designers. Your company's website launch is our priority. We'll do our best for your e-commerce website because your website is a representation of your company.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon social">
                <i class="bi bi-phone"></i>
                </div>
                <div class="services-info">
                  <h3>Social Media Marketing</h3>
                  <p>Social media's impact on modern culture is undeniable. At Sagmetic Infotech, we excel in social media marketing, creating top-notch content and ads to engage followers on platforms like Facebook, Instagram, and Twitter. Boost your business with our expertise.</p>
                </div>
              </div>
            </div>
          
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="hover-box">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
              <div class="line4"></div>
              <div class="box">
                <div class="icon wordpress">
                <i class="bi bi-wordpress"></i>
                </div>
                <div class="services-info">
                  <h3>WordPress Development</h3>
                  <p>At Sagmetic Infotech, we offer expert WordPress development services: unique themes/plugins, design, migration, optimization, maintenance, and support. Our team ensures your site exceeds expectations. Let's discuss your project and enhance your website.</p>
                </div>
              </div>
            </div>
            </div>  
        </div>
      </div>
    </div>
    </div>
  </section>
<section class="about-sec" id="about">
  <div class="container">
    <div class="about-content row">
      <div class="aboutimg-sec col-lg-6 col-sm-12">
        <img class="img-fluid" src="{{asset('website_frontend/images/design.png')}}" alt="web development company">
      </div>
<div class="about-sagmetic col-lg-5 col-sm-12">
  <div class="skyblue-heading top-heading" data-aos="zoom-in-up">
    <h5>About Sagmetic Infotech</h5>
  </div>
  <div class="text">
    <h2>We Do Design, Code 
      & Develop.</h2>
      <p>"We do design, code, & develop" is more than simply a tagline; it captures our enthusiasm for developing creative and significant digital solutions. Our team of skilled designers and developers work in perfect harmony to bring your ideas to life. From crafting beautiful user interfaces to writing efficient code, we approach every project with the same level of dedication and attention to detail. Allow us to help turn your dream into a tangible reality.</p>
  </div>
<div class="value">
  <div class="number">
<p class="num">95%</p>
<p>Affordable Cost</p>
  </div>
  <div class="number">
    <p class="num">100%</p>
    <p>Quality of Work</p>
      </div>
</div>
</div>
    </div>
  </div>
</section>
<section class="benefits-sec" id="contact">
  <div class="container">
    <div class="benefits-content row">
      <div class=" col-lg-5 col-sm-12">
        <div class="benefit">
          <div class="green-heading top-heading" data-aos="zoom-in-up" >
            <h5>Why choose us</h5>
          </div>
          <div class="text">
            <h2>Benefits Of Choosing Our Agency</h2>
              <p>As Sagmetic Infotech, we are a leading web design and development agency that offers a wide range of services to our clients. By choosing us, you can benefit from our years of experience in the industry, our skilled team of professionals, and our commitment to delivering high-quality solutions that meet your specific needs. We understand the importance of creating an effective online presence for your business, and we work closely with you to design and develop a website that accurately represents your brand and engages your target audience. With our expertise and personalized approach, you can trust us to help you achieve your online goals and drive your business forward.</p>
          </div>
        </div>
      </div> 
      <div class=" col-lg-6  col-sm-12">
        <div class="form-sec">
          <div class="form-wrapper">
            <h3>Get a free quote</h3>
            <form id="contactform" action="#" method="post">  
              @csrf          
              <div class="floating-label-group">
                <input type="text" class="form-control" id="name" name="name" autocomplete="off"  required />
                  <label class="floating-label" for="name">Name</label>
                </div>
                <div class="floating-label-group">
                  <input type="email"  class="form-control" id="email" name="email" autocomplete="off"  required />
                    <label class="floating-label" for="email">Email</label>
                </div>
                  <div class="floating-label-group">
                    <input type="text"  class="form-control" id="phone" name="phone" autocomplete="off" required/>
                      <label class="floating-label" for="phone">Phone</label>
                  </div>
                    <div class="floating-label-group">
                      <input type="text"  class="form-control" id="subject" name="subject" autocomplete="off"  required />
                        <label class="floating-label" for="subject">Subject</label>
                      </div>
                      <div class="floating-label-group">
                        <textarea cols="20" rows="5" class="form-control" id="message" name="message" autocomplete="off"  required></textarea>
                          <label class="floating-label" for="message">Message</label>
                        </div>
                         <div class="g-recaptcha" data-sitekey="6LfVIXImAAAAAIrJjLAllCGuWMANH6q-ud_MvPPl"></div>
                         <div class="mail-response my-2" style="font-size: 17px;"></div>
                        <div class="button">
                        <button type="submit" class="btn">Send Message <img class="img-fluid" src="{{asset('website_frontend/images/button-polygon.svg')}}" alt="image"> </button>
                    </div>
            </form>    
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="get-started-sec">
  <div class="container">
    <div class="get-started-content">
      <div class="orange-heading top-heading " data-aos="zoom-in-up">
        <h5>Request a quote</h5>
      </div>
      <h2>Lets Get Started Your Project</h2>
      <p>We will help you to achieve your goals and to grow your business. <br>
        Call us :<a href="tel:+919915941692">+91 9915941692</a></p>
    </div>
  </div>
</section>
<section class="expert-sec">
  <div class="container">
    <div class="expert-content">
      <div class="expert-heading ">
        <div class="green-heading top-heading" data-aos="zoom-in-up">
          <h5>Experts in field</h5>
        </div>
        <h2>Design Startup Movement</h2>
        <p>Our sagmetic infotech programs are implemented to drive real growth to your business.</p>
      </div>
      <div class="expert">
        <div class="row box-wrapper">
          <div class="col-md-3 boxes">
            <div class="box">
              <div class="icon briefcase">
              <i class="bi bi-briefcase-fill"></i>
              </div>
              <div class="counter-container">
              <ul id="counter">
                <li>
                  <span class="count percent" data-count="10">
                    0
                  </span>
                  <span>+</span>
                </li>
              </ul>
            </div>
              <p>Years of Experince</p>
          </div>
        </div>
          <div class="col-md-3 boxes">
            <div class="box">
              <div class="icon user">
              <i class="bi bi-people-fill"></i>
              </div>
              <div class="counter-container">
              <ul id="counter1">
                <li>
                  <span class="count percent" data-count="45">
                    0
                  </span>
                  <span>+</span>
                </li>
              </ul>
            </div>
              <p>Skilled Professionals</p>
          </div>
        </div>
          <div class="col-md-3 boxes">
            <div class="box">
              <div class="icon rocket">
              <i class="bi bi-rocket-takeoff"></i>
              </div>
              <div class="counter-container ">
              <ul id="counter2">
                <li>
                  <span class="count percent" data-count="4.1">0</span><span>k</span>
                </li>
              </ul>
            </div>
              <p>Projects Worldwide</p>
          </div>
        </div>
          <div class="col-md-3 boxes">
            <div class="box">
              <div class="icon coin">
              <i class="bi bi-coin"></i>
              </div>
              <div class="counter-container">
              <ul id="counter3">
                <li>
                  <span class="count percent" data-count="95">
                    0
                  </span>
                  <span>%</span>
                </li>
              </ul>
            </div>
              <p>Affordable Cost</p>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
</section>
<section class="testimonial-sec" id="reviews">
  <div class="container">
<div class="testimonial-content">
  <div class="testimonial-heading">
    <div class="purple-heading top-heading" data-aos="zoom-in-up">
      <h5>Our Testimonials</h5>
    </div>
    <h2>What They’re Saying</h2>
  </div>
  <div class="testimonial-slider">
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Modern website design and development
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"Rabinder's WordPress, custom development and design skills are
                excellent. He was instrumental in helping us create an enterprise
                website using modern technologies, third party products and custom
                coding. I recommend him for anyone seeking to build a website or
                custom web applications."
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Build A Complex E-commerce Website 
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>“Great job on building a complex e-commerce website! Your hard work and dedication to this project are truly appreciated. The website you created is impressive and has exceeded our expectations. Your attention to detail and problem-solving skills have been a key factor in delivering a successful end-product. Thank you for your professionalism and commitment to excellence. We look forward to continuing to work with you in the future.”               
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Wordpress Theme Replacement To Lightweight Theme 
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"As a former programmer myself hiring a remote worker, it took a little while for Rabinderjit and me to establish our communication approach as he is 12 hours ahead of my time zone. Once the project got underway and our method of communication was working, things progressed nicely. There were a few questions I asked that were not answered, but all in all, the work was good, and the end result was great. I was pleasantly surprised by his ability to bring some good CSS and PHP skills to some issues we were having, and that saved the day for completing the project."             
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>WordPress Plugin Development
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"Rabinderjit is one of the best developers I have found on Upwork. He is extremely knowledgeable, talented, creative, and has a positive outlook. I really enjoy working him and will continue to work with him. I appreciate his can-do attitude – even if something is challenging, he gives it his best and the results always impress me. I enjoy receiving updates from Rabinderjit because I know the quality will always be of a high standard. Lastly, I appreciate his courtesy and utmost honesty, which are rare qualities to find on Upwork. Thank you very much for your hard work and commitment to my project, and I am looking forward to the next chapter of the project with you."            
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Shopify build for new b2c website
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"I would highly recommend Majinder who supported me with a Shopify build from scratch. He is
                highly professional, very responsive, and goes above and beyond n order to deliver a fantastic
                final product.
                Manjinder is a relaxed down to earth individual also, which makes working with him much easier.
                He is always willing to jump on a call when necessary and could switch direction when I had a
                new idea or plan.
                Again, highly recommend."
                </p>
            </div>
        </div>    
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Shopify Website Updates
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"Sandeep was amazing at custom coding our website. He gave our website a much more elevated feel. He was easy to communicate with, and we were very happy with the quality of his work and his speed. We would absolutely recommend him."            
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Website Revamp And Update  
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"I received the most incredible service! Rabinderjit updated my website and implemented the most amazing designs and functionality. The flow from my page landing, to shopping, booking an appointment, billing, and even email redesign was cared for and completed to my 100% satisfaction. I was hesitant to trust my business with anyone, but once Jit got started, and I saw the initial designs, I became completely invested in it. It took much longer than expected, but that's because I didn't know what Rabinderjit was capable of, and then I had a million more ideas I wanted to add in. Thank you a million times over!"            
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Web Designer That Has Experience With Luxury Real Estate 
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"I am sure I wasn't an easy client since I started from scratch with no pre knowledge and skills concerning websites, software's etc… But Parmeshwar was always very helpful and took his time to explain things and next steps to take very good. I very much like his designs and professionalism, as well as the quick timing to respond. I will always recommend him, and I am already looking forward to our next project to get realized together!"         
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Picture And Photo Gallery Authenticated Site 
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"Ankush was great to work with as always. Great contribution and suggestions towards the project and great attention to detail. Very reliable and flexible. Very knowledgeable on several technologies."            
                </p>
            </div>
        </div>
        <div class="testimonial-slide">
          <div class="profile">
            <div class="info">
            <h5>Swapcee 
            </h5>
            <div class="star">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            </div>
            </div>
          </div>
            <div class="para">
              <p>"Parmesh did an amazing job, followed through with every part of the updates I laid out for my website and more! Along with great communication, he has a great understanding of website development, as all my ideas were understood to a high degree and implemented quickly. I would highly recommend Parmesh to anyone and will work with him in the future."           
                </p>
            </div>
        </div>
    </div>
  </div>
</div>
</section>
<section class="lets-talk-sec">
  <div class="container">
    <div class="lets-talk-content row">
      <div class="heading col-lg-6 col-lg-5">
        <h2>Let’s Talk About Your Next 
          Business Challenge</h2>
          <p>Get to meet Your Next Business</p>
      </div>
      <div class="button col-lg-3 col-md-5">
        <a href="#contact" class="btn" >Request a Quote<img class="img-fluid" src="{{asset('website_frontend/images/button-polygon.svg')}}" alt="image"></a>
    </div>
    </div>
  </div>
</section>
@endsection