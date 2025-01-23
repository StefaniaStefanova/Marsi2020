import classNames from 'classnames'

const Markup = ({attributes, options, clientId}) => {
	const { btnAppearance, btnIcon, btnText } = attributes;
	const { GkitIcon } = window.gutenkit.components;
    const btnProps = {
		className: classNames(
			{['icon-wrapper']: btnAppearance !== 'text-only'},
			{['text-wrapper']: btnAppearance === 'text-only'},
		)
	};

    return (
        <div className='gkit-back-to-top' data-settings={JSON.stringify(options)}>
            <span {...btnProps}>
                {btnAppearance === 'icon-only' && (
                    <GkitIcon icon={btnIcon} />
                )}

                {btnText && btnAppearance === 'text-only' && btnText}

                {btnText && btnAppearance === 'progress-indicator' && (
                    <div className="progress-indicator">
                        <canvas id={`canvas-${clientId}`} className="canvas" data-canvas={clientId}></canvas>
                        <GkitIcon icon={btnIcon} />
                    </div>
                )}
            </span>
        </div>
    )
}

export default Markup