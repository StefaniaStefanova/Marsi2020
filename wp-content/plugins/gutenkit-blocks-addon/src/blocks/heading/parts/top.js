
import Separator from './separator';
import classnames from 'classnames';

const Top = ({attributes, SubtitleTag, subTitleProps}) => {

    return (<>
        {
            attributes?.separatorPosition === "top" && (
                <Separator
                    wrapper={{
                        className: classnames({
                            [`gkit-heading-separetor`]: attributes?.showSeparator,
                            [`gkit-heading-separetor-${attributes?.separatorPosition}`]: attributes?.separatorPosition,
                            [`gkit-heading-separetor-style-${attributes?.separatorStyle}`]: attributes?.separatorStyle
                        })
                    }}
                    divider={{
                        className: classnames({
                            [`gkit-heading-separetor-divider`]: attributes?.showSeparator
                        })
                    }}
                />
            )
        }
        {
            attributes?.showShadowText && (
                <span className='gkit-heading-shadow-text'>{attributes?.shadowTextContent}</span>
            )
        }
        {
            attributes?.subtitlePosition === "before-title" && (
                <>
                    {
                        attributes?.showSubtitle && (
                            <SubtitleTag {...subTitleProps}>{attributes?.subtitleContent}</SubtitleTag>
                        )
                    }
                </>
            )
        }
        {
            attributes?.separatorPosition === "before-title" && (
                <Separator
                    wrapper={{
                        className: classnames({
                            [`gkit-heading-separetor`]: attributes?.showSeparator,
                            [`gkit-heading-separetor-${attributes?.separatorPosition}`]: attributes?.separatorPosition,
                            [`gkit-heading-separetor-style-${attributes?.separatorStyle}`]: attributes?.separatorStyle
                        })
                    }}
                    divider={{
                        className: classnames({
                            [`gkit-heading-separetor-divider`]: attributes?.showSeparator
                        })
                    }}
                />
            )
        }
    </>)
}

export default Top