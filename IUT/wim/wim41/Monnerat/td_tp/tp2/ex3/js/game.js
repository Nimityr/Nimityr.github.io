let count   = 0;
let playing = false;


document.querySelector("figure").addEventListener("click", (e) =>
{
  if (playing == true)
  {
    document.querySelector("span").textContent = ++count;
  }
});



document.querySelector("button").addEventListener("click", (e) =>
{
  document.querySelector("button").classList.add("hidden");
  document.querySelector("p").classList.remove("hidden");

  playing = true;

  let text = document.querySelector("p").querySelector("span");
  let time = 15;

  text.textContent = time + " seconds left!";
  text.style.color = "red";

  let timer = setInterval(function()
  {
    text.textContent = --time + " seconds left!";
  }, 1000);

  setTimeout(() =>
  {
    clearInterval(timer);
    playing = false;
    text.textContent = "End!";
  }, 15000);
});
