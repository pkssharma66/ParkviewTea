<section class="offer-section">

    <div class="container">

        <div class="offer-box">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <span class="offer-tag">

                        Limited Time Offer

                    </span>

                    <h2>

                        Get <span>30% OFF</span><br>

                        Premium Tea Collection

                    </h2>

                    <p>

                        Enjoy the rich aroma and authentic taste of premium tea.
                        Order today and receive exclusive discounts with free delivery.

                    </p>

                    <div class="offer-countdown">

                        <div>

                            <span id="days">00</span>

                            <small>Days</small>

                        </div>

                        <div>

                            <span id="hours">00</span>

                            <small>Hours</small>

                        </div>

                        <div>

                            <span id="minutes">00</span>

                            <small>Minutes</small>

                        </div>

                        <div>

                            <span id="seconds">00</span>

                            <small>Seconds</small>

                        </div>

                    </div>

                    <a href="{{ url('/shop') }}" class="btn-theme mt-4">

                        Shop Now

                    </a>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="{{ asset('assets/images/green-tea.jpeg') }}"
                        class="offer-image"
                        alt="Premium Tea">

                </div>

            </div>

        </div>

    </div>

</section>

<script>

const endDate=new Date();

endDate.setDate(endDate.getDate()+15);

function countdown(){

const now=new Date();

const diff=endDate-now;

const days=Math.floor(diff/1000/60/60/24);

const hours=Math.floor(diff/1000/60/60)%24;

const minutes=Math.floor(diff/1000/60)%60;

const seconds=Math.floor(diff/1000)%60;

document.getElementById('days').innerHTML=days;

document.getElementById('hours').innerHTML=hours;

document.getElementById('minutes').innerHTML=minutes;

document.getElementById('seconds').innerHTML=seconds;

}

setInterval(countdown,1000);

countdown();

</script>