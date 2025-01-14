import { WebVoiceProcessor } from '@picovoice/web-voice-processor';

const startButton = document.getElementById('start');
const stopButton = document.getElementById('stop');
const transcriptElement = document.getElementById('transcript');

let audioContext;
let voiceProcessor;

startButton.addEventListener('click', async () => {
  try {
    audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    const mediaStreamSource = audioContext.createMediaStreamSource(stream);

    voiceProcessor = await WebVoiceProcessor.create(audioContext, {
      source: mediaStreamSource,
    });

    startButton.disabled = true;
    stopButton.disabled = false;
    console.log('Voice Processor started');
  } catch (error) {
    console.error('Error accessing audio:', error);
  }
});

stopButton.addEventListener('click', () => {
  if (voiceProcessor) {
    voiceProcessor.stop();
    audioContext.close();
    startButton.disabled = false;
    stopButton.disabled = true;
    console.log('Voice Processor stopped');
  }
});
