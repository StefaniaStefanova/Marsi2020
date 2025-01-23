const getAnimation = (entry) => {
    if (entry.target.hasAttribute('data-animation')) {
        let animationData = JSON.parse(entry.target.getAttribute('data-animation'));
        let getOldClasses = entry.target.classList;
        getOldClasses.forEach((className) => {
            if (className !== "animate__animated" && className.includes("animate__") && animationData?.className !== className) {
                entry.target.classList.remove(className);
            }
        });
        entry.target.classList.add(animationData?.className);
        entry.target.style.animationDuration = `${animationData?.speed}ms`;
    }
}

export default getAnimation;