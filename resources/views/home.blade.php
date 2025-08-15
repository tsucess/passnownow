@extends('layouts.index')

<!--
    =============================
    Custom Styles for Home Page
    =============================
    These styles control the look and feel of the home page sections, cards, animations, and hover effects.
    Move to external CSS for better maintainability in the future.
-->
<style>
.guides .guide{
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #ddd; /* Optional: Add a subtle border */
    border-radius: 8px; /* Optional: Add rounded corners */
    padding: 15px; /* Optional: Add some padding */
    text-align: center; /* Ensure content is centered */
}

.guides .guide:hover{
    transform: scale(1.05); /* Slightly increase size */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
    border-color: #007bff; /* Optional: Change border color */
}




.middle{
    animation: growShrink 2s infinite ease-in-out;
}

@keyframes growShrink {
    0%, 100% {
        transform: scale(1); /* Normal size */
    }
    50% {
        transform: scale(1.1); /* Slightly larger */
    }
}



.myWrapper{
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 15px; /* Optional: Add some padding */
    text-align: center; /* Ensure content is centered */
}

.myWrapper:hover{
    transform: scale(1.05); /* Slightly increase size */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
    border-color: #007bff; /* Optional: Change border color */
}

.hover-grow {
  transition: transform 0.3s ease-in-out;
}

.hover-grow:hover {
  transform: scale(1.1);
}



.bounce-on-hover {
  transition: transform 0.3s ease-in-out;
}

.bounce-on-hover:hover {
  animation: bounce 0.7s infinite;
}

@keyframes bounce {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}



.a1{
    animation: fade-card linear both;
    animation-timeline: view();

}

.a2 {
    animation: fade linear both;
    animation-timeline: view();
}

.a3 {
    animation: fade-card linear both;
    animation-timeline: view();

}


.a4{
    animation: fade-card linear both;
    animation-timeline: view();

}

.a5 {
    animation: fade linear both;
    animation-timeline: view();
}

.a6 {
    animation: fade-card linear both;
    animation-timeline: view();

}

@keyframes fade-card {
    0% {
        opacity: 0;
        top:200px;
    }
    40% {
        opacity: 1;
        top:0px;
    }
}


@keyframes fade {
    0% {
        opacity: 0;
    }
    40% {
        opacity: 1;
    }
    100% {
        opacity: 1;
    }
}


#count-number {
    transition: transform 0.003s ease; /* Add optional effects */
}

</style>



<!--
    =============================
    Custom JavaScript for Home Page
    =============================
    Handles animated counters, progress bars, and Swiper initialization.
    Consider moving to external JS files for better maintainability.
-->
<script>

// =============================
// Animated Counter for Lifetime Learners
// =============================
// Animates the number in the #count-number element when it comes into view.
document.addEventListener("DOMContentLoaded", () => {
    const countElement = document.getElementById("count-number");
    let countingInterval; // Variable to hold the interval

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Start counting when the div is in view
                    startCounting(countElement, 1, 5, 200);
                } else {
                    // Stop counting when the div is out of view
                    resetCounting(countElement, 1); // Reset the number to 1M+
                }
            });
        },
        {
            threshold: 0.5, // Trigger when 50% of the element is visible
        }
    );

    observer.observe(countElement);

    // Function to perform the counting animation
    function startCounting(element, start, end, duration) {
        let current = start;
        const step = (end - start) / (duration / 50); // Calculate step size based on duration

        // Clear any previous intervals to avoid overlapping
        clearInterval(countingInterval);

        countingInterval = setInterval(() => {
            current += step;
            if (current >= end) {
                current = end;
                clearInterval(countingInterval); // Stop the animation when the target is reached
            }
            element.textContent = `${Math.floor(current)}M+`; // Update the number in the element
        }, 50); // Update every 50ms
    }

    // Function to reset the number when out of view
    function resetCounting(element, resetTo) {
        clearInterval(countingInterval); // Stop any ongoing interval
        element.textContent = `${resetTo}M+`; // Reset the number
    }
});






// =============================
// Animated Counter for Daily Messages
// =============================
// Animates the number in the #counting element when it comes into view.
document.addEventListener("DOMContentLoaded", () => {
    const countElement = document.getElementById("counting");
    let countingInterval; // Variable to hold the interval

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Start counting when the div is in view
                    startCounting(countElement, 1, 5, 200);
                } else {
                    // Stop counting when the div is out of view
                    resetCounting(countElement, 1); // Reset the number to 1M+
                }
            });
        },
        {
            threshold: 0.5, // Trigger when 50% of the element is visible
        }
    );

    observer.observe(countElement);

    // Function to perform the counting animation
    function startCounting(element, start, end, duration) {
        let current = start;
        const step = (end - start) / (duration / 50); // Calculate step size based on duration

        // Clear any previous intervals to avoid overlapping
        clearInterval(countingInterval);

        countingInterval = setInterval(() => {
            current += step;
            if (current >= end) {
                current = end;
                clearInterval(countingInterval); // Stop the animation when the target is reached
            }
            element.textContent = `${Math.floor(current)}M+`; // Update the number in the element
        }, 50); // Update every 50ms
    }

    // Function to reset the number when out of view
    function resetCounting(element, resetTo) {
        clearInterval(countingInterval); // Stop any ongoing interval
        element.textContent = `${resetTo}M+`; // Reset the number
    }
});



<!-- Moving  -->

<!-- The other number -->
document.addEventListener("DOMContentLoaded", () => {
    const countElement = document.getElementById("counting");
    let countingInterval; // Variable to hold the interval

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Start counting when the div is in view
                    startCounting(countElement, 1, 5, 200);
                } else {
                    // Stop counting when the div is out of view
                    resetCounting(countElement, 1); // Reset the number to 1M+
                }
            });
        },
        {
            threshold: 0.5, // Trigger when 50% of the element is visible
        }
    );

    observer.observe(countElement);

    // Function to perform the counting animation
    function startCounting(element, start, end, duration) {
        let current = start;
        const step = (end - start) / (duration / 50); // Calculate step size based on duration

        // Clear any previous intervals to avoid overlapping
        clearInterval(countingInterval);

        countingInterval = setInterval(() => {
            current += step;
            if (current >= end) {
                current = end;
                clearInterval(countingInterval); // Stop the animation when the target is reached
            }
            element.textContent = `${Math.floor(current)}M+`; // Update the number in the element
        }, 50); // Update every 50ms
    }

    // Function to reset the number when out of view
    function resetCounting(element, resetTo) {
        clearInterval(countingInterval); // Stop any ongoing interval
        element.textContent = `${resetTo}M+`; // Reset the number
    }
});


// =============================
// Animated Progress Bar for Academic Performance
// =============================
// Animates the percentage in the #progress-number element when it comes into view.
document.addEventListener("DOMContentLoaded", () => {
    const progressElement = document.getElementById("progress-number");
    const targetValue = 70; // Final value (70%)
    let countingInterval; // Interval for counting

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Start counting when the div is in view
                    startCounting(progressElement, 0, targetValue, 1000); // 1000ms duration
                } else {
                    // Reset the number to 0% when the div is out of view
                    resetCounting(progressElement);
                }
            });
        },
        {
            threshold: 0.5, // Trigger when 50% of the div is visible
        }
    );

    observer.observe(progressElement);

    // Function to count up to the target value
    function startCounting(element, start, end, duration) {
        let current = start;
        const step = (end - start) / (duration / 50); // Calculate step size based on interval

        // Clear any previous intervals to avoid overlapping
        clearInterval(countingInterval);

        countingInterval = setInterval(() => {
            current += step;
            if (current >= end) {
                current = end; // Cap at the target value
                clearInterval(countingInterval); // Stop the interval
            }
            element.textContent = `${Math.floor(current)}%`; // Update the text content
        }, 50); // Update every 50ms
    }

    // Function to reset the number to 0%
    function resetCounting(element) {
        clearInterval(countingInterval); // Clear any ongoing intervals
        element.textContent = "0%"; // Reset the text to 0%
    }
});

</script>






@section('content')
    <main class="container-fluid">
        <section class="container-fluid container__top pt-3">
            <div class="row">
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/WAEC.png') }}" class = "w-50"  alt="Chemistry">
                    <p class="title fw-bold mt-2" style="font-size: 15px; color: #103161;">WAEC</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/JAMB.png') }}" class = "w-50" alt="JAMB">
                    <p class="title fw-bold">JAMB</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/NECO.png') }}" class = "w-50" alt="NECO">
                    <p class="title fw-bold">NECO</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/TOEFL.png') }}" class = "w-50"  alt="TOEFL">
                    <p class="title fw-bold">TOEFL</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/IELTS.png') }}" class = "w-50"alt="IELTS">
                    <p class="title fw-bold">IELTS</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/IGCSE.png') }}" class = "w-50" alt="IGCSE">
                    <p class="title fw-bold">IGCSE</p>
                </div>
            </div>
        </section>

        <Section class="container-fluid container__hero">
            <div class="row">
                <div class="col-12 col-md-6 hero__content">
                    <p class="total-enrol">6,000+ Students Enrolled</p>
                    <h1>Take Control of your Education Anytime, Anywhere</h1>
                    <p class="hero__info">Super simple self studying, peer to peer collaborative learning both for teachers
                        and students</p>
                    <div class="hero-btn">
                        <a href="{{ url('register') }}" class="btn btn-outline-primary btn-style">Register &nbsp; <i
                                class="fa-solid fa-arrow-right"></i></a>
                        <a href="#learnMore" class="btn btn-style btn-style-secondary">Learn More</a>
                    </div>
                </div>
                <div class="col-12 col-md-6  hero-image">
                    <img src="{{ asset('images/hero-image.png') }}" alt="Hero Image">
                </div>
            </div>
        </Section>

        <section class="container-fluid container__review">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 heading">
                    <h3>Learn from the largest education resources for students in Nigeria</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9 px-lg-4  mx-auto reviews">
                    <div class="row">
                        <div class="col-12 col-md-6 review">
                            <h3 id = "count-number">5M+</h3>
                            <p>Lifetime <br/> Learners</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3>1M+</h3>
                            <p>Career <br /> Advices</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3 id = "progress-number">70%</h3>
                            <p>High Academic <br /> Performance</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3 id = "counting">5M+</h3>
                            <p>Daily <br /> Messages</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid container__guide">
            <div class="row ">
                <div class="col-12 col-md-3 text-center">
                    <img src="{{ asset('images/formular.png') }}" alt="" class="formular-image">
                </div>
                <div class="col-12 col-md-6 heading">
                    <h3>How Passnownow Works</h3>
                    <p>
                        Passnownow is Nigeria’s foremost online learning platform that provides students with access to
                        high-quality educational materials tailored to their specific needs which are affordable and easily
                        accessible.
                    </p>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <img src="{{ asset('images/trig.png') }}" alt="" class="formular-image">
                </div>
            </div>
            <div class="row guides animate__animated animate__slideInDown" id = "learnMore">
                <div class="col-12 col-md-4 mb-lg-3 guide a1">
                    <img src="{{ asset('images/icon-user.png') }}" alt="Icon" class="mb-3" />
                    <h3>Create free account</h3>
                    <p>The first step is to create a free account with Passnownow by completing the user registration form.
                    </p>

                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide a2">
                    <img src="{{ asset('images/icon-card.png') }}" alt="Icon" class="mb-3 fade-effect" />
                    <h3>Subscribe to a plan</h3>
                    <p>Choose from any of our packages to gain access to unlimited Class Notes and Exam Past Questions.</p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide a3">
                    <img src="{{ asset('images/icon-book.png') }}" alt="Icon" class="mb-3" />
                    <h3>Access all subjects</h3>
                    <p>That’s it, you now have access to unlimited Class Notes and Exam Past Questions.</p>
                </div>

                {{-- <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-message.png') }}" alt="Icon" class="mb-3" />
                    <h3>Seek career advice</h3>
                    <p>Seek advice on your career path from our experienced career counselor</p>
                </div>

                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-shield.png') }}" alt="Icon" class="mb-3" />
                    <h3>Access to past questions</h3>
                    <p>Passnownow gives you access to Thousands of exam past questions from JSCE, JSSCE TO JAMB</p>
                </div>

                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-medal.png') }}" alt="Icon" class="mb-3" />
                    <h3>Improve academic performance</h3>
                    <p>Learn with Passnownow to improve academic performance</p>
                </div> --}}


            </div>
        </section>

        <Section class="container-fluid container__hero-down mb-3">
            <div class="row">
                <div class="col-12 col-md-6 hero-down__content" style = "background:#4082BC;">
                    <p class="total-enrol">We do home tutoring the right way.</p>
                    <h1>Passnownow: Your Partner In Lifelong Learning.</h1>
                    <p class="hero-down__info">Make Passnownow your partner in lifelomg learning, providing you with the
                        resources and support you need to succeed at every stage of your journey.</p>
                    <div class="hero-btn">
                        <a href="{{ url('register') }}" class="btn btn-outline-primary btn-style">Register &nbsp; <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6  hero-down-image" style = "background:#4082BC;">
                    <img src="{{ asset('images/hero_down.png') }}" alt="Hero Image">
                </div>
            </div>
        </Section>

        <section class="container-fluid container__std_review">
            <div class="row">
                <div class="col-12 col-md-2 text-end">
                    <img src="{{ asset('images/quote_trans.png') }}" alt="" class="quote-down-image">
                </div>
                <div class="col-12 col-md-8 heading px-4 px-md-2">
                    <h6>Rave Reviews from our amazing students! 😍</h6>
                </div>
                <div class="col-12 col-md-2">
                </div>
            </div>
            <div class="row reviews mb-5">
                <!-- Slider main container -->
                <div class="swiper col-12">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title mt-2">Yusuf Gambo</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">Mose John</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">Samuel Mary</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">David Adeshola</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="row frames">
                <div class="col-12 col-md-4 my-3 hover-grow">
                    <img src="{{ asset('images/users_1.png') }}" alt="">
                </div>
                <div class="col-12 col-md-4 my-3 frame mobile middle">
                    <img src="{{ asset('images/mobile-frame.png') }}" alt="">
                </div>
                <div class="col-12 col-md-4 my-3 frame hover-grow">
                    <img src="{{ asset('images/users_2.png') }}" alt="">
                </div>
            </div>
        </section>

        <Section class="container-fluid container__performance" style = "background: #4082BC;">
            <div class="bg-image">
                <div class="row">
                    <div class="col-12 col-md-2 col-lg-3"></div>
                    <div class="col-12 col-md-8 col-lg-6 performance__content">
                        <p class="total-enrol">We deliver the best results, periods.</p>
                        <h1>Passnownow students perform 3x better in class and school exams</h1>
                    </div>
                    <div class="col-12 col-md-2 col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 barchart mt-4 middle">
                        <img src="{{ asset('images/barchart.png') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6 performance__info">
                        <div class="lists">
                            <p class="list_sn">1</p>
                            <p class="list">We work with you to ensure your kids excel at every stage of their learning
                                journey</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">2</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">3</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">4</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="row mt-5">
                    <div class="col-12 col-md-2 text-end">
                        <img src="{{ asset('images/quote_tr.png') }}" alt="" class="quote-down-image">
                    </div>
                    <div class="col-12 col-md-8 heading px-4 px-md-2">
                        <h6>Rave Reviews from our amazing Tutors!! 😍</h6>
                    </div>
                    <div class="col-12 col-md-2">
                    </div>
                </div>
                <div class="row reviews mb-5">
                    <!-- Slider main container -->
                    <div class="swiper col-12">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Yusuf Gambo</h5>
                                    <p>Cohorts 3</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Mose John</h5>
                                    <p>Cohorts 3</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Samuel Mary</h5>
                                    <p>Cohorts 5</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">David Adeshola</h5>
                                    <p>Cohorts 5</p>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div> --}}


            </div>
        </Section>

        {{-- <section class="container-fluid container__notes" >
            <div class="row" id="class__notes">
                <div class="col-12 text-center mb-5">
                    <h6>Class Notes</h6>
                </div>
            </div>
            <div class="row">
                @foreach ($fetchClasses as $class)
                    <div class="col-12 col-md-4 mb-3 hover-grow">
                        <div class="image-wrapper h-50">
                            <img src="{{ asset('storage/' . $class->avatar) }}" alt="">
                        </div>
                        <div class="note_info p-2">
                            <h5>{{ $class->title }} Class Notes</h5>
                            <p> {{ $class->description }}</p><br>
                            <a href="{{ url('/subjects') }}" class="note_btn">VIEW ALL SUBJECTS</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row" id="exam__questions">
                <div class="col-12 text-center mb-5">
                    <h6>Past Questions</h6>
                </div>
            </div>
            <div class="row past__questions ">
                @foreach ($fetchExams as $exam)
                    <div class="col-12 col-md-4 mb-3 hover-grow">
                        <div class="image-wrapper h-50">
                            <img src="{{ asset('storage/'.$exam->avatar) }}" alt="">
                        </div>
                        <div class="note_info p-2">
                            <h5>{{$exam->title}} Past Questions</h5>
                            <p>{{$exam->description}}</p><br>
                            <a href="{{ url('/pastquestions') }}" class="note_btn mt-5">VIEW ALL QUESTIONS</a>
                        </div>
                    </div>
                @endforeach
                 --}}
                {{-- <div class="col-12 col-md-4 mb-3">
                <div class="col-12 col-md-4 mb-3 myWrapper">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>JSSCE Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div> --}}
                {{-- <div class="col-12 col-md-4 mb-3">
                </div>
                <div class="col-12 col-md-4 mb-3 myWrapper">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>SSCE Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3 myWrapper">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>UTME/JAMB Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div> --}}

            {{-- </div>
        </section> --}}

        {{-- <section class="container-fluid container__parent_review">
            <div class="row my-4">
                <div class="col-12 col-md-2 text-end">
                    <img src="{{ asset('images/quote_trans.png') }}" alt="" class="quote-down-image">
                </div>
                <div class="col-12 col-md-8 heading px-4 px-md-2">
                    <h6>Rave Reviews from our amazing parents! 😍</h6>
                </div>
                <div class="col-12 col-md-2">
                </div>
            </div>
            <div class="row reviews mb-5">
                <!-- Slider main container -->
                <div class="swiper col-12">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Yusuf Gambo</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Mose John</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Samuel Mary</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">David Adeshola</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section> --}}

    </main>










    <!--
        =============================
        Swiper.js Initialization
        =============================
        Initializes the Swiper slider for reviews and testimonials.
    -->
    <script src="./js/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            // Optional parameters
            direction: "horizontal",
            // effect: "fade",
            loop: true,
            autoplay: {
                dely: '2000' // Typo: should be 'delay', but left as is for compatibility with current code
            },

            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                size: '1rem'
            },

        });
    </script>
@endsection
