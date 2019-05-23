import React from 'react';
import { Form } from 'react-final-form';
import { withStyles } from '@material-ui/styles';
import Param from '../component/Param';
import ExpansionGenerale from '../component/ExpansionGenerale';
import arrayMutators from 'final-form-arrays';
import ChampsCapture from '../component/ChampsCapture';
import ParamSidebox from '../component/ParamSidebox';
import Audit from '../component/Audit';
import InfoUtilisateur from '../component/InfoUtilisateur';
import CaptureEmail from '../component/ConfigCaptureEmail';
import Style from '../component/Style';

const json = {
  client_id: '5a0193d10e154',
  version: '2', //osef
  timestamp: 1557236693551, //osef
  debug: false,
  live: true,
  testing: false,
  is_audit: true, //osef for now
  audit_value: '50', // osef
  useGA: false, //osef
  gaFunc: 'ga', //osef
  apiUrl: null,
  sidebarUrl: null,
  tagUrl: null,
  domain: { main: '' }, //
  //Data collect osef
  dataCollect: [
    {
      name: 'BASKET',
      condition: { regexp: { URL: ['.*'] } },
      clear: null,
      persist: true,
      value: [
        {
          name: 'total',
          condition: null,
          clear: null,
          value: {
            type: 'DOM_ELT',
            selector: '#total_price',
            attribute: 'textContent',
          },
        },
        {
          name: 'ITEMS',
          condition: null,
          clear: null,
          container: '.product-container',
          value: [
            {
              name: 'product_name',
              condition: null,
              clear: null,
              value: {
                type: 'DOM_ELT',
                selector: '.product-name',
                attribute: 'textContent',
              },
            },
          ],
        },
      ],
    },
    { name: 'EMAILS', condition: null, clear: null, persist: true, value: [] },
    {
      name: 'USER',
      condition: { regexp: { URL: [] } },
      clear: { regexp: { URL: [] } },
      persist: true,
      value: [],
    },
    null,
    null,
    {
      name: 'DOMAIN',
      value: { type: 'OBJ_JS', name: 'window.location.hostname' },
      persist: true,
    },
  ],
  sidebar: {
    capping: { count: null, interval: '86400000' },
    cta: { nbr: null },
    closebutton: {
      template:
        '<a style="cursor: pointer; display: block; background-color: rgba(0,0,0,0.15) !important; color: rgba(255,255,255,0.35) !important; width: 40px; height: 40px; font-size: 16px;line-height: 40px;text-align: center;">X</a>',
    },
  },
};

const onSubmit = values => console.log(values);
// const styles = () => ({
//   rootForm: {
//     width: '90%',
//     margin: 'auto',
//   },
//   container: {
//     display: 'flex',
//     flexWrap: 'wrap',
//     //justifyContent: 'center',
//     width: '100%',
//     marginTop: 10,
//   },
//   field: {},
// });

const FormTest = props => {
  // const { classes } = props;
  return (
    <Style>
      {' '}
      <Form
        onSubmit={onSubmit}
        mutators={{
          ...arrayMutators,
        }}
        //validate={validate}
        // initialValues={{
        //   CaptureEmail: 'titi@titi.fr',
        //   domaine_principal: 'toto',
        //   domains: ['test1', 'test2'],
        // }}
        render={({
          handleSubmit,
          form: {
            mutators: { push, pop },
          },
          submitting,
          pristine,
          values,
        }) => (
          <form onSubmit={handleSubmit}>
            <ExpansionGenerale
              title="paramètres"
              detail={
                <Param
                  Add={name => push(name, undefined)}
                  Remove={name => pop(name)}
                />
              }
            />
            <ExpansionGenerale
              title="Paramètres Sidebox"
              detail={<ParamSidebox />}
            />
            <ExpansionGenerale
              title="Champs de capture"
              detail={
                <ChampsCapture
                  Add={name => push(name, undefined)}
                  Remove={name => pop(name)}
                />
              }
            />
            <ExpansionGenerale
              title="Audit"
              detail={
                <Audit
                  Add={name => push(name, undefined)}
                  Remove={name => pop(name)}
                />
              }
            />
            <ExpansionGenerale
              title="Info Utilisateur"
              detail={
                <InfoUtilisateur
                  Add={name => push(name, undefined)}
                  Remove={name => pop(name)}
                />
              }
            />
            <ExpansionGenerale
              title="CONFIGURATION DES CAPTURES D'EMAIL"
              detail={
                <CaptureEmail
                  Add={name => push(name, undefined)}
                  Remove={name => pop(name)}
                />
              }
            />

            <div>
              <button type="submit" disabled={submitting || pristine}>
                Submit
              </button>
            </div>
            <pre>{JSON.stringify(values, 0, 2)}</pre>
          </form>
        )}
      />
    </Style>
  );
};
export default FormTest;
