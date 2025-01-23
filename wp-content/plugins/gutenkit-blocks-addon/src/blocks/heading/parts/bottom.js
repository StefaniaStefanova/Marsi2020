import Separator from "./separator";
import classnames from 'classnames'

const Bottom = ({ attributes, SubtitleTag, subTitleProps }) => {
    return (<>
        {
            attributes?.separatorPosition === "after-title" && (
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
            attributes?.subtitlePosition === "after-title" && (
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
            attributes?.showDescription && (
                <div className="gkit-heading-description">
                    <p>{attributes?.descriptionContent}</p>
                </div>
            )
        }
        {
            attributes?.separatorPosition === "bottom" && (
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

export default Bottom