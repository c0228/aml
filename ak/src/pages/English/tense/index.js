import React from "react";
import { ContainerFluid, Card, Colors } from "e-ui-react";

const Tense = ()=> {
    return(<>
<ContainerFluid>
<div className="mtop15p mbot15p">
            <div className="mtop15 mbot15p">
                <h2 className="bs-header" style={{fontFamily:"fantasy", opacity:"0.85",marginBottom:"5px"}}>What are tenses in English?</h2>
                <span style={{marginTop:"5px"}}>A tense is a form of the verb that allows you to express time. 
                The tense of the verb tells us when an event or something existed or when a person did something. 
                Past, present, and future are the three main types of tenses.</span>
                <div className="mtop15p ,mbot15p">
                    <h2 className="bs-header" style={{fontFamily:"Franklin Gothic Medium", opacity:"0.75",marginBottom:"5px"}}>
                        What are the three main types of tenses and why do we need them?
                    </h2>
                    <span style={{marginTop:"5px"}}>Past, present and future are the three main types of tenses.</span>
                </div>
                <div className="mtop15p mbot15p">
                <h3 className="bs-header" style={{fontFamily:"fantasy", color:"dodgerblue", marginTop:"5px"}}>Past Tense</h3>
                    <span style={{marginTop:"5px"}}>The past tense is used to describe an activity or an event that has happened in 
                    the past or a past state of being and needs to include a time marker for when the event or action took place.</span>
                    <div clasName="mtop15p mbot15p">
                    <h3 className="bs-header" style={{fontFamily:"fantasy", opacity:"0.8", marginTop:"5px"}}>Structural formula:</h3>
                    <div className="mtop15p mbot15p">
                <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.primary} style={{ color:'white' }}>
                    <b>Subject + verb (V2- form) + object</b> 
                </Card>
                </div>
                <span style={{marginTop:"5px"}}></span>
                    </div>
                </div>
            </div>
            </div>
</ContainerFluid>
{/* Franklin Gothic Medium */}

    </>);
};

export default Tense;