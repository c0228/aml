import React from "react";
import { ContainerFluid, Card, Colors } from "e-ui-react";

const Posent = ()=> {
    return(<>
    <ContainerFluid>
        <div className="mtop15p mbot15p">
            <div className="mtop15 mbot15p">
                <h2 className="bs-header" style={{fontFamily:"fantasy", opacity:"0.85",marginBottom:"5px"}}>Parts of a Sentence Summary</h2>
                <span style={{marginTop:"5px"}}>The parts of a sentence can be divided into two main parts:</span>
                <ul>
                    <li><b>Subject:</b>who or what the sentence is about</li>
                    <li><b>Predicate:</b>what is being said about the subject</li>
                </ul>
                <span style={{marginTop:"5px"}}>The predicate will start with a verb and could have various other elements:</span>
                <div className="mtop15p mbot15p">
                <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.primary} style={{ color:'white' }}>
                    <b>VERB</b> + indirect object/direct object/subject complement
                </Card>
                </div>
            </div>
            <div className="mtop15p mbot15p">
            <h2 className="bs-header" style={{fontFamily:"fantasy", opacity:"0.85"}}>Parts of a Sentence</h2><br/>
            <span style={{marginTop:"5px"}}>The main two parts of a sentence are the subject and predicate, with the subject 
            identifying whom or what the sentence is about and the predicate giving more information about the subject. <br />
            The elements within the predicate adding more detail or meaning, are verbs, direct objects, indirect objects, 
            and subject complements.</span>
            <div className="mtop15p mbot15p">
                <h3 className="bs-header" style={{fontFamily:"fantasy", color:"dodgerblue", marginTop:"5px"}}>Subject</h3>
                <span style={{marginTop:"5px"}}>The main two parts of a sentence are the subject and predicate, with the subject 
                identifying whom or what the sentence is about and the predicate giving more information about the subject. <br />
                The elements within the predicate adding more detail or meaning, are verbs, direct objects, indirect objects, 
                and subject complements.</span>
                <div className="mtop15p">
                <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.success} style={{ color:'white', opacity:"0.5" }}>
                <ul>
                    <li>The woman...</li>
                    <li>Cars....</li>
                    <li>The boy in the red coat... (includes modifying phrase)</li>
                </ul>
                </Card>
                </div>
            </div>
            <div className="mtop15p mbot15p">
            <h3 className="bs-header" style={{fontFamily:"fantasy", color:"dodgerblue", marginTop:"5px"}}>Predicate</h3>
            <span style={{marginTop:"5px"}}>While the subject is what the sentence is about, the predicate is what is being 
            said about the subject. It will always include a verb but will usually also include other elements. So these are
             what it will/may include:</span>
             <ul>
                <li>Verb</li>
                <li>Direct Object</li>
                <li>Indirect Object</li>
                <li>Subject Complement</li>
             </ul>
             <span style={{marginTop:"5px"}}>In the examples below, the predicate is in bold.</span>
             <div className="mtop15p mbot15p">
            <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.success} style={{ color:'white', opacity:"0.5" }}>
            <ul>
                <li>The woman <b>is hot</b></li>
                <li>Cars <b>are blocking all the parking spaces</b></li>
                <li>The boy in the red coat is <b>trying to find his toy</b></li>
            </ul>
            </Card>
            </div>
            <span style={{marginTop:"5px"}}>Predicates as parts of a sentence can get a little more complex than this as 
            there can be predicates within predicates when there are other clauses in the sentence (the ones above have 
            just one clause) and there are also compound predicates.
            We will look in more details at predicates in another lesson.</span>
            </div>
            <div className="mtop15p mbot15p">
                <h3 className="bs-header" style={{fontFamily:"fantasy", color:"dodgerblue", marginTop:"5px"}}>Direct and Indirect Objects</h3>
                <span style={{marginTop:"5px"}}>The predicate always includes and starts with a verb, but it may also be followed by objects.</span>
                <div className="mtop15p mbot15p">
                    <h3 className="bs-header" style={{fontFamily:"fantasy", color:"black", marginTop:"5px", opacity:"0.8"}}>Direct Object</h3>
                    <span style={{marginTop:"5px"}}>A direct object is the receiver of the action within a sentence, and it is usually a noun 
                    or pronoun. They are used with action verbs and are shown below in bold:</span>
                    <div className="mtop15p mbot15p">
                        <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.success} style={{ color:'white', opacity:"0.5" }}>
                        <ul>
                            <li>He built <b>a cottage</b></li>
                            <li>The horse jumped <b>the fence</b></li>
                            <li>He ate <b>some dinner</b></li>
                        </ul>
                        </Card>
                    </div>
                </div>
                <div className="mtop15p mbot15p">
                <h3 className="bs-header" style={{fontFamily:"fantasy", color:"black", marginTop:"5px", opacity:"0.8"}}>Indirect Object</h3>
                    <span style={{marginTop:"5px"}}>Indirect objects can only be in a sentence if there is also a direct object. 
                    They indicate to whom or for whom the action of the sentence is being done. Again, the indirect object is 
                    usually a noun or pronoun. <br />
                    They are shown below in bold (the direct object is now the last noun).</span>
                    <div className="mtop15p mbot15p">
                        <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.success} style={{ color:'white', opacity:"0.5" }}>
                        <ul>
                            <li>He built <b>his family</b> a cottage</li>
                            <li>She bought <b>them</b> some presents</li>
                            <li>He gave <b>his girlfriend</b> a kiss</li>
                        </ul>
                        </Card>
                    </div>
                </div>
            </div>
            <div className="mtop15p mbot15p">
            <h3 className="bs-header" style={{fontFamily:"fantasy", color:"dodgerblue", marginTop:"5px"}}>Subject Complement</h3>
                <span style={{marginTop:"5px"}}>It was explained above that objects are used with action verbs. However, for 
                state verbs (verbs that describe a state of being e.g. is, see, hear, feel etc) subject complements follow the verb.< br/>
                A subject complement renames or describes the subject, and again is often followed by a noun or pronoun, but also commonly an adjective.</span>
                    <div className="mtop15p mbot15p">
                        <Card className="intro" padding={15} borderRadius={0} backgroundColor={Colors.success} style={{ color:'white', opacity:"0.5" }}>
                        <ul>
                            <li>John is <b>a really nice person</b></li>
                            <li>She seems <b>happy</b></li>
                            <li>I was <b>impressed by the film</b></li>
                        </ul>
                        </Card>
                    </div>
            </div>
        </div>
        </div>
    </ContainerFluid>
    </>);
};

export default Posent;