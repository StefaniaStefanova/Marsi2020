import classnames from 'classnames';
import Profile from './profile';
import Popup from './popup';
import { handleModalEditor } from '../Event';

const Markup = ({ attributes,  isEdit, teamRef }) => {
    const { style, image, enablePopup } = attributes;
    const { GkitImage } = window.gutenkit.components;
    const normalStyles = ['default', 'centered_style', 'centered_style_details', 'long_height_details', 'long_height_details_hover', 'hover_info']
    const hoverStyles = ['overlay', 'overlay_details', 'long_height_hover', 'overlay_circle', 'overlay_circle_hover']

    const wrapperProps = {
        className: classnames(
            'gkit-team',
            { 'profile-square-v': style === 'centered_style' },
            { 'profile-square-v square-v5 no_gutters': style === 'centered_style_details' },
            { 'profile-square-v square-v6 no_gutters': style === 'long_height_details' },
            { 'profile-square-v square-v6 square-v6-v2 no_gutters': style === 'long_height_details_hover' },
            { 'image-card-v2': style === 'overlay_details' },
            { 'image-card-v3 small-gutters': style === 'long_height_hover' },
            { 'style-circle gkit-team-img-fit': style === 'overlay_circle' },
            { 'image-card-v2 style-circle': style === 'overlay_circle_hover' },
            { [`profile-square-v square-v4 gkit-team-style-${style}`]: style === 'hover_info' },
        )
    }

    const innerWrapperProps = {
        className: classnames(
            { 'profile-card': normalStyles.includes(style) },
            { [`gkit-team-style-${style}`]: style !== 'hover_info' },
            { 'profile-image-card gkit-team-img': hoverStyles.includes(style) }
        )
    }

    const headerImageProps = {
        className: classnames(
            'profile-header',
            'gkit-team-img',
            { 'gkit-img-overlay gkit-team-img-block': style === 'default' },
        )
    }

    let clickProps ={};
    (isEdit && enablePopup) ? clickProps.onClick = () => handleModalEditor(teamRef) : null;

    const headerImage = (normalStyles.includes(style) ? (
        <div {...headerImageProps}>
            <GkitImage image={image} {...clickProps}  />
        </div>
    ) : (
        <GkitImage image={image} {...clickProps} />
    ));

    const profileBody = hoverStyles.includes(style) ? (
        <div className="hover-area">
            <Profile attributes={attributes}  isEdit={isEdit} teamRef={teamRef}/>
        </div>
    ) : (
        <Profile attributes={attributes}  isEdit={isEdit} teamRef={teamRef} />
    );

    return (<>
        <div {...wrapperProps}>
            <div {...innerWrapperProps}>
                {headerImage}
                {profileBody}
            </div>
        </div>
        <Popup attributes={attributes} isEdit={isEdit}/>
    </>)
}

export default Markup