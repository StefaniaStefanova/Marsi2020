const Markup = ({ attributes }) => {
	const { btnText, iconsSwitch, iconAlign } = attributes;
	const { GkitIcon } = window.gutenkit.components;

    return (<>
        {iconsSwitch && iconAlign == 'left' &&
            <GkitIcon icon={attributes?.icons} classes={'icon-left'} />
        }
        {btnText}
        {iconsSwitch && iconAlign == 'right' &&
            <GkitIcon icon={attributes?.icons} classes={'icon-right'} />
        }
    </>)
}

export default Markup