<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./public/css/main.css?v2">
<body>

  <div id="app">
    <div class="bg-black p-10">
      <header class="container mx-auto max-w-5xl flex justify-between items-center ">
        <a href="" class="flex items-center gap-3 logo">
          <img src="./public/coffee.png" alt="logo" width="40">
          <p class="text-white text-3xl" >CAFE</p>
        </a>
        <div class="flex justify-between items-center gap-7">
          <a href="javascript:void(0)" class="collapse-btn text-white text-3xl"><i class="bi bi-list"></i></a>
          <nav class="nav-bar flex flex-row items-center gap-4 text-white">
            <a href="javascript:void(0)" class="collapse-close">&times;</a>
            <a href="" class="text-sm" >BOOK A TABLE</a>
            <a href="" class="text-sm" >RESERVATION</a>
            <a class="text-2xl" href="#"><i class="bi bi-facebook"></i></a>
            <a class="text-2xl" href="#"><i class="bi bi-instagram"></i></a>
            <a class="text-2xl" href="#"><i class="bi bi-search"></i></a>
          </nav>
        </div>
      </header>
    </div>
    <main>
      <div class="container mx-auto max-w-5xl text-white">
        <section class="flex justify-between land-sect">
          <div class="land-text">
            <h1>Welcome Hotpot !!</h1>
            <h2>Let's fill up your cup</h2>
            <h2>real quick .</h2>
            <section class="scroll-sect flex items-center gap-3">
              <button class="scroll-down text-6xl">
                <i class="bi bi-arrow-down"></i>
              </button>
              <article class="scroll-text">
                <p>thats right baby</p>
                <p>scroll down softly .</p>
              </article>
            </section>
          </div>
          <div class="smcoffee"><img src="./public/cup1.jpg" alt="" width="400"></div>
        </section>

      </div>
      <div class="container mx-auto max-w-5xl table-menu text-white">

        <section class="mymenu container mx-auto max-w-5xl">
          <h1>Menu</h1>
        </section>
        <section class="coffee-menu">

          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/cuppa.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>
          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/latte.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>
          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/cuppa.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>
          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/cuppa.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>
          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/cuppa.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>
          <div class="coffee-item">
            <section class="coffee-pic">
              <img src="./public/cuppa.png" alt="">
            </section>
            <h1>Cupaccino</h1>
            <form class="order-form" action="">
              <input type="submit" value="Pre-Order">
            </form>
          </div>

        </section>
      </div>
      <section class="book_table container mx-auto max-w-5xl">
          <form action="">
            <input type="text">
            <input type="number">
            <div>
              <input type="number">
            </div>
          </form>
        </section>
    </main>
  </div>

  <script>
    let obtn = document.querySelector(".collapse-btn");
    obtn.addEventListener("click", (e)=>{
      document.querySelector(".nav-bar").classList.toggle("collapse-navbar");
    })
    let cbtn = document.querySelector(".collapse-close");
    cbtn.addEventListener("click", (e)=>{
      document.querySelector(".nav-bar").classList.toggle("collapse-navbar");
    })
  </script>

</body>
</html>