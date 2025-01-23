import { onScrollAnimate, observeIframeContent } from '@/helper/gkitOnScrollAnimate';
import getAnimation from './animation';

window.addEventListener('load', () => {
	
    // function for detecting markup in the viewport and execute the callback
	onScrollAnimate('.gkit-motion-effects', getAnimation);

	// observeIframeContent();
})
