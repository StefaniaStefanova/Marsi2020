const Markup = ({ attributes }) => {
    return (
        <div className="gkit-faq">
            {
                attributes?.gkitFaqContents && attributes?.gkitFaqContents.map((item, index) => {
                    return (
                        <div key={index} className="gkit-faq-item">
                            <div className="gkit-faq-item-header">
                                {
                                    item?.gkitFaqTitle && (
                                        <h2 className="gkit-faq-item-title">{item?.gkitFaqTitle}</h2>
                                    )
                                }
                            </div>
                            {
                                item?.gkitFaqContent && (
                                    <div className="gkit-faq-item-body">
                                        {item?.gkitFaqContent}
                                    </div>
                                )
                            }
                        </div>
                    )
                })
            }
        </div>
    )
}

export default Markup