

const panels = document.querySelectorAll(".panel");

panels.forEach((panel) => {
   panel.addEventListener("click", () => {
      removeActiveClasses();
      panel.classList.add("active");
   });
});

const removeActiveClasses = () => {
   panels.forEach((panel) => {
      panel.classList.remove("active");
   });
};
const inputNilaiButton = document.getElementById('Nilai');
const container = document.getElementById('container');

inputNilaiButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});


