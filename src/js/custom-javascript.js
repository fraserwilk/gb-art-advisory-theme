// Add your custom JS here.
import Lightbox from 'bs5-lightbox';

/* const lightbox = new Lightbox();
lightbox.load(); */

const options = {
	keyboard: true,
	size: 'fullscreen'
};

document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
	e.preventDefault();
	const lightbox = new Lightbox(el, options);
	lightbox.show();
}));