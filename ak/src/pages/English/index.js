import React from "react";
import Header from "@Templates/Header/index.js";
import { HeaderMenu } from "@Config/HeaderMenu.js";
import { ContainerFluid, Row, Col, Alert, Pill, Colors, UrlParams } from "e-ui-react";
import Posent from '@Pages/English/posent/index.js';
import pos from '@Pages/English/pos/index.js';
import Tense from '@Pages/English/tense/index.js';
import voices from "@Pages/English/voices/index.js";
import clausesPhrases from "@Pages/English/clausesPhrases/index.js";

const url = UrlParams().baseUrl;

const Menu = () => {
  return (
    <>
      <ContainerFluid>
        <Row>
          <Col xl={9} xxl={9}>
            <Header menulinks={HeaderMenu} activeId="English" />
            <Row>
                <Col xl={1} xxl={1}></Col>
                <Col xl={11} xxl={11}>
                <div className="mtop15p mbot15p">
              <p clasName="bs-header" style={{opacity:"0.75"}}>
              Welcome to the world of English grammar! Whether you are a budding
              writer, a language enthusiast, a student, or simply someone
              looking to improve their communication skills, you've embarked on
              a journey that promises to enrich your understanding of one of the
              most fascinating aspects of language.</p>
              <p clasName="bs-header" style={{opacity:"0.75", marginTop:"5px"}}>
              So, whether you're starting from scratch or looking to fine-tune
              your existing skills, let's embark on this grammar journey
              together. Embrace the beauty of English grammar, and soon you'll
              find yourself not just using the language but truly mastering it.
              </p>
            </div>
            <div className="mtop15p mbot15p">
            <h4 clasName="bs-header" style={{ marginTop:"5px",fontFamily:"fantasy"}}>
              Let's start the course from the very beginning and move onto to the master levels of the course
              </h4>
              <div className="mtop15p mbot15p"><Alert type="primary" show={true} body=
              {<div> Order of the topics which are going to be covered throughout this course <br/>
                Parts of Speech - Parts of Sentence - Tenses - Phrases & Clauses - 120 Rules of Sentence formation - Voices (Active / Passive)  </div>} /></div>
            </div>
            <div className="mtop15p mbot15p">
                <Pill mode="horizontal" 
                    menulinks={[
                        { id:'posent', url:'english/#posent', label:'Parts of Sentence', content:(<Posent />) },
                        { id:'pos', url:'english/#pos', label:'Parts of Speech', content:(<pos />) },
                        { id:'tense', url:'english/#tense', label:'Tenses', content:(<Tense />) },
                        { id:'voices', url:'english/#voices', label:'Voices', content:(<voices />) }]} 
                    activeId="tense" 
                    colorConfig={{
                        active: { color: Colors.light, backgroundColor: Colors.danger },
                        default: { color: Colors.secondary, backgroundColor: '' }
                }} />
            </div>
            
                </Col>
            </Row>
          </Col>
          <Col xl={3} xxl={3}></Col>
        </Row>
      </ContainerFluid>
    </>
  );
};

export default Menu;
